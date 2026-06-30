<?php

namespace Database\Seeders;

use App\Models\Enquiry;
use App\Models\Role;
use App\Models\User;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Setting;
use App\Models\WhatsappTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::updateOrCreate(['slug' => 'admin'], ['name' => 'Admin', 'description' => 'Full access']);
        Role::updateOrCreate(['slug' => 'editor'], ['name' => 'Editor', 'description' => 'Content management']);
        Role::updateOrCreate(['slug' => 'user'], ['name' => 'User', 'description' => 'Normal user']);

        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin12345'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );

        $targetUsers = 10;
        $usersToCreate = max(0, $targetUsers - User::count());
        if ($usersToCreate > 0) {
            User::factory($usersToCreate)->create(['role' => 'user']);
        }

        if (class_exists(Enquiry::class)) {
            $targetEnquiries = 25;
            $enquiriesToCreate = max(0, $targetEnquiries - Enquiry::count());
            if ($enquiriesToCreate > 0) {
                Enquiry::factory($enquiriesToCreate)->create();
            }
        }

        $this->call(CmsPagesSeeder::class);
        $this->call(HomeServicesSeeder::class);
        $this->call(AdBannersSeeder::class);
        $this->call(HomeSlidersSeeder::class);
        $this->call(HoroscopeCmsSeeder::class);
        $this->call(HoroscopePeriodSignsSeeder::class);
        $this->call(EmailTemplatesSeeder::class);

        WhatsappTemplate::updateOrCreate(
            ['slug' => 'astro_otp'],
            [
                'name' => 'Astro OTP',
                'body_text' => 'Your {{site_name}} OTP is {{code}}. It expires in {{expires_minutes}} minutes.',
                'is_active' => true,
            ]
        );

        $general = BlogCategory::updateOrCreate(['slug' => 'general'], ['name' => 'General', 'description' => 'General posts']);
        BlogPost::updateOrCreate(
            ['slug' => 'welcome-to-astroduniya'],
            [
                'blog_category_id' => $general->id,
                'title' => 'Welcome to AstroDuniya',
                'excerpt' => 'A short introduction to AstroDuniya.',
                'content' => '<p>Welcome! This is a sample blog post.</p>',
                'is_published' => true,
                'published_at' => now(),
                'meta_title' => 'Welcome to AstroDuniya',
                'meta_description' => 'Sample post',
            ]
        );

        Setting::updateOrCreate(['key' => 'site.email'], ['type' => 'string', 'value' => 'support@astroduniya.com']);
        Setting::updateOrCreate(['key' => 'site.phone'], ['type' => 'string', 'value' => '+91-2818-7280']);

        Setting::updateOrCreate(['key' => 'contact.address_html'], ['type' => 'text', 'value' => "N-1, Baldev Jyot<br>Modi Patel Road, Bhayander<br>Thane 401101, India"]);
        Setting::updateOrCreate(['key' => 'contact.business_hours'], ['type' => 'string', 'value' => 'Monday - Sunday : 9am to 9pm']);

        Setting::updateOrCreate(['key' => 'social.whatsapp'], ['type' => 'string', 'value' => 'https://wa.me/919699342442/?text=subscribe']);
        Setting::updateOrCreate(['key' => 'social.facebook'], ['type' => 'string', 'value' => '#!']);
        Setting::updateOrCreate(['key' => 'social.twitter'], ['type' => 'string', 'value' => '#!']);
        Setting::updateOrCreate(['key' => 'social.youtube'], ['type' => 'string', 'value' => '#!']);
        Setting::updateOrCreate(['key' => 'social.instagram'], ['type' => 'string', 'value' => '#!']);

        Setting::updateOrCreate(['key' => 'mail.mailer'], ['type' => 'string', 'value' => 'smtp']);
        Setting::updateOrCreate(['key' => 'mail.host'], ['type' => 'string', 'value' => '127.0.0.1']);
        Setting::updateOrCreate(['key' => 'mail.port'], ['type' => 'number', 'value' => '2525']);
        Setting::updateOrCreate(['key' => 'mail.username'], ['type' => 'string', 'value' => '']);
        Setting::updateOrCreate(['key' => 'mail.password'], ['type' => 'string', 'value' => '']);
        Setting::updateOrCreate(['key' => 'mail.encryption'], ['type' => 'string', 'value' => 'tls']);
        Setting::updateOrCreate(['key' => 'mail.from_address'], ['type' => 'string', 'value' => 'hello@example.com']);
        Setting::updateOrCreate(['key' => 'mail.from_name'], ['type' => 'string', 'value' => 'AstroDuniya']);

        Setting::updateOrCreate(['key' => 'whatsapp.enabled'], ['type' => 'bool', 'value' => '1']);
        Setting::updateOrCreate(['key' => 'whatsapp.api_url'], ['type' => 'string', 'value' => '']);
        Setting::updateOrCreate(['key' => 'whatsapp.api_token'], ['type' => 'string', 'value' => '']);
        Setting::updateOrCreate(['key' => 'whatsapp.api_key'], ['type' => 'string', 'value' => '']);
        Setting::updateOrCreate(['key' => 'whatsapp.timeout'], ['type' => 'number', 'value' => '20']);
        Setting::updateOrCreate(['key' => 'whatsapp.sender'], ['type' => 'string', 'value' => '']);
        Setting::updateOrCreate(['key' => 'whatsapp.default_country'], ['type' => 'string', 'value' => 'in']);
        Setting::updateOrCreate(['key' => 'whatsapp.user'], ['type' => 'string', 'value' => '']);
        Setting::updateOrCreate(['key' => 'whatsapp.pass'], ['type' => 'string', 'value' => '']);
    }
}
