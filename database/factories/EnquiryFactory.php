<?php

namespace Database\Factories;

use App\Models\Enquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Enquiry>
 */
class EnquiryFactory extends Factory
{
    protected $model = Enquiry::class;

    public function definition(): array
    {
        $source = $this->faker->randomElement(['contact', 'query', 'feedback', 'footer', 'chatbot']);

        return [
            'source' => $source,
            'context' => $this->faker->randomElement([
                'contact_page',
                'ask_free_query',
                'feedback_page',
                'footer_dropdown',
                'chatbot',
            ]),
            'page_url' => $this->faker->randomElement([
                url('/contact'),
                url('/query'),
                url('/feedback'),
                url('/'),
            ]),
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->optional()->numerify('##########'),
            'subject' => ucfirst($source),
            'message' => $this->faker->paragraph(),
            'meta' => $this->faker->optional()->randomElement([
                ['gender' => 'male'],
                ['gender' => 'female'],
                ['dob_time' => '01/01/1990 10:00 AM', 'birth_place' => 'Mumbai'],
                ['consent' => 1],
            ]),
            'ip' => $this->faker->ipv4(),
            'user_agent' => $this->faker->userAgent(),
        ];
    }
}

