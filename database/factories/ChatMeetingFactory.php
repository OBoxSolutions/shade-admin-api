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
            'logo_info' => $this->faker->text(),
            'logo_file' => $this->faker->url(),
            'more_info' => $this->faker->text(),
            'more_info_files' => $this->faker->url(),

        ];
    }
}
