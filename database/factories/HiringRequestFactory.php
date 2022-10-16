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
            'applying-for' => $this->faker->randomElement(['Full-Stack Web Developer', 'General Manager ', 'SEO and Marketing Expert', 'Vice President']),
            'birthdate' => $this->faker->dateTime(),
            'answers' => $this->faker->randomElement(
                [
                    'Answer 1, Answer 2, Answer 3',
                    'Answer 4, Answer 5, Answer 6',
                    'Answer 9, Answer 8, Answer 9',
                ]
            )
        ];
    }
}
