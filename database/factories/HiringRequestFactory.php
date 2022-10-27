<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HiringRequestFactory extends Factory
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
            'applying_for' => $this->faker->randomElement(['Full-Stack Web Developer', 'General Manager ', 'SEO and Marketing Expert', 'Vice President']),
            'birthdate' => $this->faker->dateTime(),
            'question_one' => $this->faker->text(),
            'question_two' => $this->faker->text(),
            'question_three' => $this->faker->text(),
            'question_four' => $this->faker->text(),
            'question_five' => $this->faker->text(),
            'question_six' => $this->faker->text(),
            'question_seven' => $this->faker->text(),
            'question_eight' => $this->faker->text(),
            'question_nine' => $this->faker->text(),
            'files_link' => $this->faker->url(),
        ];
    }
}
