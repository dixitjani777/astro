<?php

namespace App\Services\Translation;

use Illuminate\Support\Facades\Http;

class OpenAiTranslator
{
    /**
     * @param  list<string>  $strings
     * @return list<string>
     */
    public function translateBatch(array $strings, string $sourceLocale, string $targetLocale): array
    {
        $apiKey = (string) config('auto_translate.openai.api_key');
        if ($apiKey === '') {
            // No key: return original strings unchanged.
            return $strings;
        }

        $model = (string) config('auto_translate.openai.model', 'gpt-5');
        $endpoint = (string) config('auto_translate.openai.endpoint');
        $timeout = (int) config('auto_translate.openai.timeout', 30);

        $prompt = [
            "Translate the following list of UI strings from {$sourceLocale} to {$targetLocale}.",
            "Rules:",
            "- Return ONLY valid JSON array of strings (same length, same order).",
            "- Preserve HTML tags if present; translate only human-visible text.",
            "- Preserve URLs, emails, numbers, and brand names as-is.",
            "- Keep meaning concise; do not add extra commentary.",
            "",
            "INPUT_JSON:",
            json_encode(array_values($strings), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        ];

        $resp = Http::withToken($apiKey)
            ->timeout($timeout)
            ->post($endpoint, [
                'model' => $model,
                'input' => [
                    [
                        'role' => 'user',
                        'content' => implode("\n", $prompt),
                    ],
                ],
            ]);

        if (!$resp->ok()) {
            return $strings;
        }

        $json = $resp->json();
        $text = $this->extractOutputText($json);
        if (!$text) {
            return $strings;
        }

        $decoded = json_decode($text, true);
        if (!is_array($decoded)) {
            return $strings;
        }

        $out = [];
        foreach ($decoded as $i => $val) {
            $out[] = is_string($val) ? $val : ($strings[$i] ?? '');
        }

        // Ensure length matches.
        if (count($out) !== count($strings)) {
            return $strings;
        }

        return $out;
    }

    private function extractOutputText(mixed $json): ?string
    {
        if (!is_array($json)) {
            return null;
        }

        // Responses API typically returns output[] with content[] items.
        $output = $json['output'] ?? null;
        if (!is_array($output)) {
            return null;
        }

        foreach ($output as $item) {
            if (!is_array($item)) {
                continue;
            }

            $content = $item['content'] ?? null;
            if (!is_array($content)) {
                continue;
            }

            foreach ($content as $c) {
                if (is_array($c) && ($c['type'] ?? '') === 'output_text' && isset($c['text']) && is_string($c['text'])) {
                    return trim($c['text']);
                }
                if (is_array($c) && isset($c['text']) && is_string($c['text'])) {
                    return trim($c['text']);
                }
            }
        }

        return null;
    }
}

