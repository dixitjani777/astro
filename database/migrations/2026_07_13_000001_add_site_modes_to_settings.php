<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        foreach ([
            'site.mode' => ['type' => 'string', 'value' => 'normal'],
            'site.coming_soon.message' => ['type' => 'text', 'value' => 'We are preparing something new for you. Please check back soon.'],
            'site.coming_soon.launch_date' => ['type' => 'string', 'value' => ''],
            'site.coming_soon.newsletter_label' => ['type' => 'string', 'value' => 'Get launch updates'],
        ] as $key => $data) {
            DB::table('settings')->updateOrInsert(
                ['key' => $key],
                array_merge($data, ['updated_at' => $now, 'created_at' => $now])
            );
        }
    }

    public function down(): void
    {
        DB::table('settings')->whereIn('key', [
            'site.mode',
            'site.coming_soon.message',
            'site.coming_soon.launch_date',
            'site.coming_soon.newsletter_label',
        ])->delete();
    }
};
