<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CmsPagesSeeder extends Seeder
{
    private function contentFromBlade(string $path): string
    {
        $fullPath = base_path($path);
        $raw = is_file($fullPath) ? file_get_contents($fullPath) : '';

        if ($raw === '' || $raw === false) {
            return '';
        }

        if (preg_match("/@section\\('content'\\)(.*?)@endsection/s", $raw, $m)) {
            $raw = $m[1];
        }

        $raw = preg_replace("/\\{\\-\\-\\s*.*?\\s*\\-\\-\\}/s", '', $raw) ?? $raw;
        $raw = preg_replace("/\\{\\{\\-\\-\\s*.*?\\s*\\-\\-\\}\\}/s", '', $raw) ?? $raw;
        $raw = preg_replace("/\\{\\!\\!\\s*\\/\\/.*?\\!\\!\\}/s", '', $raw) ?? $raw;

        $raw = preg_replace_callback("/\\{\\{\\s*asset\\('([^']+)'\\)\\s*\\}\\}/", function ($m) {
            $p = ltrim($m[1], '/');
            return '/' . $p;
        }, $raw) ?? $raw;

        $raw = preg_replace_callback("/\\{\\{\\s*url\\('([^']*)'\\)\\s*\\}\\}/", function ($m) {
            $p = $m[1];
            if ($p === '') {
                return '/';
            }
            if (!Str::startsWith($p, '/')) {
                $p = '/' . $p;
            }
            return $p;
        }, $raw) ?? $raw;

        $raw = preg_replace_callback("/\\{\\{\\s*url\\(\\s*'([^']*)'\\s*\\)\\s*\\}\\}/", function ($m) {
            $p = $m[1];
            if ($p === '') {
                return '/';
            }
            if (!Str::startsWith($p, '/')) {
                $p = '/' . $p;
            }
            return $p;
        }, $raw) ?? $raw;

        $raw = preg_replace_callback("/\\{\\{\\s*url\\(\\s*\\\"([^\\\"]*)\\\"\\s*\\)\\s*\\}\\}/", function ($m) {
            $p = $m[1];
            if ($p === '') {
                return '/';
            }
            if (!Str::startsWith($p, '/')) {
                $p = '/' . $p;
            }
            return $p;
        }, $raw) ?? $raw;

        $raw = preg_replace("/\\{\\{\\s*url\\(\\s*'([^']*)'\\s*\\)\\s*\\}\\}/", "/$1", $raw) ?? $raw;

        $raw = preg_replace("/\\{\\{\\s*.*?\\s*\\}\\}/s", '', $raw) ?? $raw;
        $raw = preg_replace("/@include\\(.*?\\)\\s*/", '', $raw) ?? $raw;
        $raw = preg_replace("/@csrf\\s*/", '', $raw) ?? $raw;
        $raw = preg_replace("/@method\\(.*?\\)\\s*/", '', $raw) ?? $raw;

        return trim($raw);
    }

    public function run(): void
    {
        $pages = [
            [
                'title' => 'About Us',
                'slug' => 'about',
                'meta_title' => 'About Us - Astroduniya',
                'meta_description' => 'About Us',
                'content' => $this->contentFromBlade('resources/views/frontend/section/about.blade.php'),
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact',
                'meta_title' => 'Contact Us - Astroduniya',
                'meta_description' => 'Contact Us',
                'content' => trim(<<<'HTML'
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 mb-5">
                <h2 class="font-weight-light mb-5">
                    <small class="d-block h6">Let us know how can we help you!</small>
                </h2>

                <div class="row">
                    <div class="col-12 col-sm-6 mb-4">
                        <h3 class="font-weight-medium h5 mb-4">Call Us</h3>
                        <p class="m-0"><a href="tel:+9128187280" class="link-muted">(+91) 2818-7280</a></p>
                        <p class="m-0"><a href="mailto:support@astroduniya.com" class="link-muted">support@astroduniya.com</a></p>
                    </div>

                    <div class="col-12 col-sm-6 mb-4">
                        <h3 class="font-weight-medium h5 mb-4">Our Address</h3>
                        <p class="m-0">N-1, Baldev Jyot<br>Modi Patel Road, Bhayander<br>Thane 401101, India</p>
                    </div>

                    <div class="col-12 col-sm-6 mb-4">
                        <h3 class="font-weight-medium h5 mb-4">Business Hours</h3>
                        <p class="m-0">Monday - Sunday : 9am to 9pm</p>
                    </div>
                </div>

                <div class="alert alert-light mt-4 mb-0">
                    <strong>Note:</strong> This CMS page is seeded with basic HTML. If you want the full dynamic contact form and map, keep using the existing Blade fallback view or add an HTML form embed here.
                </div>
            </div>
        </div>
    </div>
</section>
HTML),
            ],
            [
                'title' => 'Donate',
                'slug' => 'donate',
                'meta_title' => 'Donate - Astroduniya',
                'meta_description' => 'Donate',
                'content' => $this->contentFromBlade('resources/views/frontend/section/donate.blade.php'),
            ],
            [
                'title' => 'Team Activity',
                'slug' => 'teamactivity',
                'meta_title' => 'Team Activity - Astroduniya',
                'meta_description' => 'Team Activity',
                'content' => $this->contentFromBlade('resources/views/frontend/section/teamactivity.blade.php'),
            ],
            [
                'title' => 'Disclaimer',
                'slug' => 'disclaimer',
                'meta_title' => 'Disclaimer - Astroduniya',
                'meta_description' => 'Disclaimer',
                'content' => $this->contentFromBlade('resources/views/frontend/section/disclaimer.blade.php'),
            ],
            [
                'title' => 'Feedback',
                'slug' => 'feedback',
                'meta_title' => 'Feedback - Astroduniya',
                'meta_description' => 'Feedback',
                'content' => $this->contentFromBlade('resources/views/frontend/section/feedback.blade.php'),
            ],
            [
                'title' => 'Payment',
                'slug' => 'payment',
                'meta_title' => 'Payment - Astroduniya',
                'meta_description' => 'Payment',
                'content' => $this->contentFromBlade('resources/views/frontend/section/payment.blade.php'),
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy',
                'meta_title' => 'Privacy Policy - Astroduniya',
                'meta_description' => 'Privacy Policy',
                'content' => $this->contentFromBlade('resources/views/frontend/section/privacy.blade.php'),
            ],
            [
                'title' => 'Terms & Conditions',
                'slug' => 'terms',
                'meta_title' => 'Terms & Conditions - Astroduniya',
                'meta_description' => 'Terms & Conditions',
                'content' => $this->contentFromBlade('resources/views/frontend/section/terms.blade.php'),
            ],
            [
                'title' => 'Teamwork',
                'slug' => 'teamwork',
                'meta_title' => 'Teamwork - Astroduniya',
                'meta_description' => 'Teamwork',
                'content' => $this->contentFromBlade('resources/views/frontend/section/teamwork.blade.php'),
            ],
        ];

        foreach ($pages as $page) {
            CmsPage::updateOrCreate(
                ['slug' => $page['slug']],
                [
                    'title' => $page['title'],
                    'content' => $page['content'],
                    'meta_title' => $page['meta_title'],
                    'meta_description' => $page['meta_description'],
                    'is_published' => true,
                ]
            );
        }
    }
}

