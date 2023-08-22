<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'file' => $this->faker->imageUrl(),
            'dimension' => $this->faker->randomElement(['1920x1080', '1080x1920', '1080x1080', '1920x1920']),
            'views_count' => $this->faker->randomNumber(5),
            'downloads_count' => $this->faker->randomNumber(5),
            // 'likes_count'=> $this->faker->numberBetween(0, 1000),
            // 'comments_count'=> $this->faker->numberBetween(0, 1000),
            // 'shares_count'=> $this->faker->numberBetween(0, 1000),
            // 'is_featured'=> $this->faker->boolean(),
            // 'is_premium'=> $this->faker->boolean(),
            // 'is_private'=> $this->faker->boolean(),
            // 'is_approved'=> $this->faker->boolean(),
            'is_published' => true,
            'user_id' => User::factory(),

        ];
    }
}
