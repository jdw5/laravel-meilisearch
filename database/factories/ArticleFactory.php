<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'teaser' => $this->faker->sentence(20),
            'user_id' => $this->faker->randomElement($array = [1, 2]),
            'published' => $this->faker->boolean($chanceOfGettingTrue = 70)
        ];
    }
}
