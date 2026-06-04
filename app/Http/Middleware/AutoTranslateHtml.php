<?php

namespace App\Http\Middleware;

use App\Services\Translation\AutoTranslator;
use Closure;
use DOMDocument;
use DOMXPath;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutoTranslateHtml
{
    public function __construct(private readonly AutoTranslator $translator)
    {
    }

    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        if (!$this->shouldTranslate($request, $response)) {
            return $response;
        }

        $sourceLocale = (string) config('auto_translate.source_locale', 'en');
        $targetLocale = (string) app()->getLocale();
        if ($targetLocale === $sourceLocale) {
            return $response;
        }

        $html = (string) $response->getContent();
        $translated = $this->translateHtml($html, $sourceLocale, $targetLocale);
        $response->setContent($translated);

        return $response;
    }

    private function shouldTranslate(Request $request, Response $response): bool
    {
        if (!(bool) config('auto_translate.enabled', true)) {
            return false;
        }

        if (!$request->isMethod('GET')) {
            return false;
        }

        if ($request->is('admin') || $request->is('admin/*')) {
            return false;
        }

        if ($response->getStatusCode() !== 200) {
            return false;
        }

        $ct = (string) $response->headers->get('Content-Type', '');
        if (!str_contains($ct, 'text/html')) {
            return false;
        }

        return true;
    }

    private function translateHtml(string $html, string $sourceLocale, string $targetLocale): string
    {
        $maxNodes = (int) config('auto_translate.max_nodes', 1200);
        $maxTextLen = (int) config('auto_translate.max_text_len', 300);

        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $xpath = new DOMXPath($dom);

        // Text nodes excluding script/style/noscript.
        $textNodes = $xpath->query('//text()[normalize-space(.) != "" and not(ancestor::script) and not(ancestor::style) and not(ancestor::noscript)]');
        $attrNodes = $xpath->query('//*[@alt or @title or @placeholder or @aria-label]');

        $strings = [];
        $nodeMap = [];
        $count = 0;

        if ($textNodes) {
            foreach ($textNodes as $n) {
                if (++$count > $maxNodes) {
                    break;
                }
                $text = trim((string) $n->nodeValue);
                if ($text === '' || strlen($text) > $maxTextLen) {
                    continue;
                }
                if ($this->skip($text)) {
                    continue;
                }
                $strings[] = $text;
                $nodeMap[] = ['type' => 'text', 'node' => $n, 'value' => $text];
            }
        }

        if ($attrNodes) {
            foreach ($attrNodes as $el) {
                if (++$count > $maxNodes) {
                    break;
                }
                foreach (['alt', 'title', 'placeholder', 'aria-label'] as $attr) {
                    if (!$el->hasAttribute($attr)) {
                        continue;
                    }
                    $val = trim((string) $el->getAttribute($attr));
                    if ($val === '' || strlen($val) > $maxTextLen || $this->skip($val)) {
                        continue;
                    }
                    $strings[] = $val;
                    $nodeMap[] = ['type' => 'attr', 'node' => $el, 'attr' => $attr, 'value' => $val];
                }
            }
        }

        $strings = array_values(array_unique($strings));
        $map = $this->translator->translateMany($strings, $sourceLocale, $targetLocale);

        foreach ($nodeMap as $item) {
            $src = $item['value'];
            $tr = $map[$src] ?? null;
            if (!is_string($tr) || $tr === '' || $tr === $src) {
                continue;
            }

            if ($item['type'] === 'text') {
                $item['node']->nodeValue = $tr;
            } else {
                $item['node']->setAttribute($item['attr'], $tr);
            }
        }

        return $dom->saveHTML() ?: $html;
    }

    private function skip(string $text): bool
    {
        // Skip pure numbers/symbols and very short fragments.
        if (mb_strlen($text) <= 1) {
            return true;
        }
        if (preg_match('/^[0-9\\s\\-+():.,%₹$€£]+$/u', $text)) {
            return true;
        }
        // Skip code-ish / URLs
        if (preg_match('~https?://~i', $text)) {
            return true;
        }
        if (preg_match('/^[A-Z0-9_\\-]{2,}$/', $text)) {
            return true;
        }
        return false;
    }
}

