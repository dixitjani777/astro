<?php

namespace Tests\Feature;

use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EnquiryRepliesTest extends TestCase
{
    use RefreshDatabase;

    public function test_logged_in_enquiry_submission_auto_fills_email_phone_from_user(): void
    {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'mobile' => '9999999999',
            'role' => 'user',
        ]);

        $response = $this->actingAs($user)->post(route('enquiries.store'), [
            'subject' => 'Test',
            'message' => 'Hi',
        ]);

        $response->assertSessionHas('status');

        $this->assertDatabaseHas('enquiries', [
            'user_id' => $user->id,
            'email' => 'user@example.com',
            'phone' => '9999999999',
        ]);
    }

    public function test_user_can_reply_with_text_and_image_only(): void
    {
        Storage::fake('public');

        $user = User::factory()->create(['email' => 'user@example.com', 'role' => 'user']);
        $enquiry = Enquiry::factory()->create(['email' => 'user@example.com']);

        $response = $this->actingAs($user)->post(route('account.enquiries.replies.store', $enquiry), [
            'body' => 'Hello',
            'attachment' => UploadedFile::fake()->image('photo.jpg'),
        ]);

        $response->assertRedirect(route('account.enquiries.show', $enquiry));
        $this->assertDatabaseHas('enquiry_replies', [
            'enquiry_id' => $enquiry->id,
            'sender_type' => 'user',
        ]);

        $path = $enquiry->replies()->first()?->attachment_path;
        $this->assertNotEmpty($path);
        Storage::disk('public')->assertExists($path);
    }

    public function test_user_cannot_reply_with_audio_or_video(): void
    {
        Storage::fake('public');

        $user = User::factory()->create(['email' => 'user@example.com', 'role' => 'user']);
        $enquiry = Enquiry::factory()->create(['email' => 'user@example.com']);

        $response = $this->actingAs($user)->post(route('account.enquiries.replies.store', $enquiry), [
            'body' => 'Audio attempt',
            'attachment' => UploadedFile::fake()->create('voice.mp3', 50, 'audio/mpeg'),
        ]);

        $response->assertSessionHasErrors(['attachment']);
    }

    public function test_admin_can_reply_with_audio_and_payment_link(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create(['role' => 'admin']);
        $enquiry = Enquiry::factory()->create();

        $response = $this->actingAs($admin)->post(route('admin.enquiries.replies.store', $enquiry), [
            'body' => 'Please pay here',
            'payment_url' => 'https://example.com/pay/123',
            'attachment' => UploadedFile::fake()->create('voice.mp3', 50, 'audio/mpeg'),
        ]);

        $response->assertRedirect(route('admin.enquiries.show', $enquiry));
        $this->assertDatabaseHas('enquiry_replies', [
            'enquiry_id' => $enquiry->id,
            'sender_type' => 'admin',
            'payment_url' => 'https://example.com/pay/123',
        ]);
    }

    public function test_admin_enquiry_show_displays_ip_location_label(): void
    {
        Http::fake([
            'ip-api.com/*' => Http::response([
                'status' => 'success',
                'country' => 'United States',
                'regionName' => 'California',
                'city' => 'Mountain View',
                'zip' => '94043',
                'lat' => 37.422,
                'lon' => -122.084,
                'query' => '8.8.8.8',
            ], 200),
        ]);

        $admin = User::factory()->create(['role' => 'admin']);
        $enquiry = Enquiry::factory()->create(['ip' => '8.8.8.8']);

        $response = $this->actingAs($admin)->get(route('admin.enquiries.show', $enquiry));
        $response->assertOk();
        $response->assertSee('Mountain View, California, United States (94043)');
    }
}
