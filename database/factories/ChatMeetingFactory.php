<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChatMeetingFactory extends Factory
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
            'about' => $this->faker->text(),
            'goals' => $this->faker->text(),
            'budget' => $this->faker->text(),
            'logo-info' => $this->faker->name(),
            'logo-file' => $this->faker->url(),
            'more-info' => $this->faker->text(),
            'more-info-files' => $this->faker->url(),

        ];
    }
}
