<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->words(3, true),
            "url" => Str::slug($this->faker->words(3, true), '-'),
            "published_at" => Carbon::now(),
            "body" => $this->faker->sentence(15),
            "category_id" => $this->faker->numberBetween(1,10),
            "user_id" => 1
        ];
    }
}
