<?php

namespace App\Services\Translation;

use App\Models\AiTranslation;
use Illuminate\Support\Arr;

class AutoTranslator
{
    public function __construct(
        private readonly OpenAiTranslator $openAiTranslator
    ) {}

    public function translate(string $text, string $sourceLocale, string $targetLocale): string
    {
        $hash = hash('sha256', $sourceLocale . '|' . $targetLocale . '|' . $text);

        $existing = AiTranslation::query()->where('hash', $hash)->value('translated_text');
        if (is_string($existing) && $existing !== '') {
            return $existing;
        }

        $out = $this->openAiTranslator->translateBatch([$text], $sourceLocale, $targetLocale)[0] ?? $text;

        AiTranslation::query()->create([
            'source_locale' => $sourceLocale,
            'target_locale' => $targetLocale,
            'source_text' => $text,
            'translated_text' => $out,
            'hash' => $hash,
        ]);

        return $out;
    }

    /**
     * @param  list<string>  $strings
     * @return array<string,string> Map original => translated
     */
    public function translateMany(array $strings, string $sourceLocale, string $targetLocale): array
    {
        $strings = array_values(array_unique(array_filter($strings, fn ($s) => is_string($s) && $s !== '')));
        if (!$strings) {
            return [];
        }

        $hashes = [];
        foreach ($strings as $s) {
            $hashes[$s] = hash('sha256', $sourceLocale . '|' . $targetLocale . '|' . $s);
        }

        $existingRows = AiTranslation::query()
            ->whereIn('hash', array_values($hashes))
            ->get(['hash', 'translated_text']);

        $existingByHash = $existingRows->pluck('translated_text', 'hash')->all();

        $map = [];
        $missing = [];
        foreach ($strings as $s) {
            $h = $hashes[$s];
            if (isset($existingByHash[$h]) && is_string($existingByHash[$h]) && $existingByHash[$h] !== '') {
                $map[$s] = $existingByHash[$h];
            } else {
                $missing[] = $s;
            }
        }

        if (!$missing) {
            return $map;
        }

        $batchSize = (int) config('auto_translate.batch_size', 25);
        foreach (array_chunk($missing, max(1, $batchSize)) as $chunk) {
            $translated = $this->openAiTranslator->translateBatch($chunk, $sourceLocale, $targetLocale);

            $now = now();
            $inserts = [];
            foreach ($chunk as $i => $src) {
                $tr = $translated[$i] ?? $src;
                $map[$src] = $tr;
                $inserts[] = [
                    'source_locale' => $sourceLocale,
                    'target_locale' => $targetLocale,
                    'source_text' => $src,
                    'translated_text' => $tr,
                    'hash' => $hashes[$src],
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }

            // Ignore duplicates in race conditions.
            AiTranslation::query()->insertOrIgnore($inserts);
        }

        return $map;
    }
}

