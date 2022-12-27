<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tool>
 */
class ToolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->word(12),
            'link' => 'https://www.'.Str::slug($this->faker->unique()->word).'.com.br',
            'description' => $this->faker->text(40),
            'tags' => [
                $this->faker->unique()->word,
                $this->faker->unique()->word,
                $this->faker->unique()->word,
                $this->faker->unique()->word
            ]
        ];
    }
}
