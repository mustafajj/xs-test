<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'image_path' => $this->faker->imageUrl(),
            'category_id' => $this->faker->numberBetween(1, 6),
            'content_format_id' => $this->faker->numberBetween(1, 6),
            'external_url' => $this->faker->url,
            'description' => $this->faker->paragraph,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
