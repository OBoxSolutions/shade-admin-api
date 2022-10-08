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
            'questions-answers' => $this->faker->randomElement(
                [
                    'Question 1: Answer 1, Question 2: Answer 2', 'Question 3: Answer 3',
                    'Question 4: Answer 4, Question 5: Answer 5', 'Question 6: Answer 6',
                    'Question 9: Answer 9, Question 8: Answer 8', 'Question 9: Answer 9',
                ]
            )
        ];
    }
}
