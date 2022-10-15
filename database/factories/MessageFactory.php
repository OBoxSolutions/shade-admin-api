<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'subject' => $this->faker->text(20),
            'social' => $this->faker->randomElement(['Discord', 'Email', 'Messanger', 'Instagram']),
            'contact' => $this->faker->unique()->safeEmail(),
            'text' => $this->faker->text()
        ];
    }
}
