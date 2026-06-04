<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MicrosoftGraphMailService
{
    private const GRAPH_BASE = 'https://graph.microsoft.com/v1.0';

    public function configured(): bool
    {
        return (bool) (config('msgraph.tenant_id')
            && config('msgraph.client_id')
            && config('msgraph.client_secret'));
    }

    public function mailboxes(): array
    {
        $raw = (string) config('msgraph.mailboxes', '');
        $mailboxes = array_values(array_filter(array_map('trim', explode(',', $raw))));
        return array_values(array_unique($mailboxes));
    }

    public function listInboxMessages(string $mailbox, ?string $nextLink = null, int $top = 25): array
    {
        $this->assertMailboxAllowed($mailbox);

        $url = $nextLink ?: self::GRAPH_BASE . '/users/' . rawurlencode($mailbox) . '/mailFolders/Inbox/messages';
        $query = $nextLink ? [] : [
            // fetch enough data for listing; body fetched in "show"
            '$top' => max(1, min(50, $top)),
            '$orderby' => 'receivedDateTime DESC',
            '$select' => implode(',', [
                'id',
                'subject',
                'from',
                'sender',
                'toRecipients',
                'ccRecipients',
                'bccRecipients',
                'receivedDateTime',
                'sentDateTime',
                'internetMessageId',
                'conversationId',
                'isRead',
                'hasAttachments',
                'importance',
                'categories',
                'bodyPreview',
            ]),
        ];

        return $this->graphGet($url, $query);
    }

    public function getMessage(string $mailbox, string $messageId): array
    {
        $this->assertMailboxAllowed($mailbox);

        $url = self::GRAPH_BASE . '/users/' . rawurlencode($mailbox) . '/messages/' . rawurlencode($messageId);
        $query = [
            '$select' => implode(',', [
                'id',
                'subject',
                'body',
                'bodyPreview',
                'from',
                'sender',
                'toRecipients',
                'ccRecipients',
                'bccRecipients',
                'replyTo',
                'receivedDateTime',
                'sentDateTime',
                'internetMessageId',
                'conversationId',
                'isRead',
                'hasAttachments',
                'importance',
                'categories',
                'flag',
                'webLink',
            ]),
        ];

        return $this->graphGet($url, $query);
    }

    public function listAttachments(string $mailbox, string $messageId): array
    {
        $this->assertMailboxAllowed($mailbox);

        $url = self::GRAPH_BASE . '/users/' . rawurlencode($mailbox) . '/messages/' . rawurlencode($messageId) . '/attachments';
        $query = [
            '$select' => implode(',', [
                'id',
                'name',
                'contentType',
                'size',
                'isInline',
            ]),
        ];

        return $this->graphGet($url, $query);
    }

    public function getFileAttachment(string $mailbox, string $messageId, string $attachmentId): array
    {
        $this->assertMailboxAllowed($mailbox);

        $url = self::GRAPH_BASE . '/users/' . rawurlencode($mailbox)
            . '/messages/' . rawurlencode($messageId)
            . '/attachments/' . rawurlencode($attachmentId);

        // fileAttachment includes contentBytes in response
        return $this->graphGet($url);
    }

    private function assertMailboxAllowed(string $mailbox): void
    {
        $allowed = $this->mailboxes();
        if ($allowed && !in_array($mailbox, $allowed, true)) {
            abort(404);
        }
    }

    private function graphGet(string $url, array $query = []): array
    {
        $token = $this->accessToken();

        try {
            return Http::withToken($token)
                ->acceptJson()
                ->timeout(30)
                ->get($url, $query)
                ->throw()
                ->json();
        } catch (RequestException $e) {
            $message = $e->response?->json('error.message') ?? $e->getMessage();
            abort(502, 'Microsoft Graph error: ' . $message);
        }
    }

    private function accessToken(): string
    {
        $tenantId = (string) config('msgraph.tenant_id');
        $clientId = (string) config('msgraph.client_id');
        $clientSecret = (string) config('msgraph.client_secret');

        if (!$tenantId || !$clientId || !$clientSecret) {
            abort(500, 'Microsoft Graph is not configured.');
        }

        $cacheKey = 'msgraph.access_token.' . sha1($tenantId . '|' . $clientId);

        return Cache::remember($cacheKey, now()->addMinutes(50), function () use ($tenantId, $clientId, $clientSecret) {
            $tokenUrl = 'https://login.microsoftonline.com/' . rawurlencode($tenantId) . '/oauth2/v2.0/token';

            try {
                $json = Http::asForm()
                    ->acceptJson()
                    ->timeout(30)
                    ->post($tokenUrl, [
                        'client_id' => $clientId,
                        'client_secret' => $clientSecret,
                        'grant_type' => 'client_credentials',
                        'scope' => 'https://graph.microsoft.com/.default',
                    ])
                    ->throw()
                    ->json();
            } catch (RequestException $e) {
                $message = $e->response?->json('error_description') ?? $e->getMessage();
                abort(502, 'Microsoft token error: ' . $message);
            }

            $accessToken = $json['access_token'] ?? null;
            if (!is_string($accessToken) || $accessToken === '') {
                abort(502, 'Microsoft token error: missing access_token.');
            }

            return $accessToken;
        });
    }
}
