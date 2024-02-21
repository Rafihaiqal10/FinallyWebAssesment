<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => fake()->unique()->numerify('#####'),
            'nama' => fake()->name(),
            'kelass_id' => fake()->numberBetween(1, 5),
            'tgl_lahir' => fake()->date(),
            'alamat' => fake()->address(),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'nis' => null,
        ]);
    }
}
