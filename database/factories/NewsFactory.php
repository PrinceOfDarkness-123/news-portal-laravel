<?php

namespace Database\Factories;

use App;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userId = User::inRandomOrder()->value('id') ?? 1;
        $categoryId = \App\Models\Category::inRandomOrder()->value('id') ?? 1;

        return [
            'title' => $this->faker->sentence(6, true),
            'content' => $this->faker->paragraphs(3, true),
            'user_id' => $userId,
            'category_id' => $categoryId,
            'image' => null,  // You can add fake image URLs here if you want
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
