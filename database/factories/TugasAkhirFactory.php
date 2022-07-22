<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TugasAkhir>
 */
class TugasAkhirFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => null,
            'judul' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'abstrak' => $this->faker->text,
            'cover' => $this->faker->image2(public_path('images/cover'), 420, 595, false),
            'file' => null,
            'status' => $this->faker->boolean,
        ];
    }
}
