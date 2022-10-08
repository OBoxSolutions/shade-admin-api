<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VoiceMeetingFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail(),
            'country' => $this->faker->randomElement(['USA', 'Cuba', 'Russia', 'United Kingdom']),
            'birthdate' => $this->faker->dateTime(),
            'app' => $this->faker->randomElement(['Discord', 'Messanger', 'Twitter', 'Instagram']),
            'meeting-date' => $this->faker->dateTime(),
            'time-before-meeting' => $this->faker->randomElement(['15 min', '30 min', '45 min', '1h']),
            'meeting-link' => $this->faker->url(),
        ];
    }
}
