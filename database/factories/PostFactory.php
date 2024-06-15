<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(mt_rand(8, 15)),
            'slug' => fake()->slug(),
            'abstract' => fake()->paragraph(30),
            // 'dosenFirstName' => fake()->firstName($gender = 'male'|'female'),
            // 'dosenLastName' => fake()->lastName(),
            'url' => fake()->url(),
            'published_at' => fake()->date(),
            'user_id' => mt_rand(1,2),
            'lab_id' => mt_rand(1,3),
            'jenjang_id' => mt_rand(1,3),
            'poster' => 'cover-poster/posterskripsi.jpg'
        ];
    }
}
