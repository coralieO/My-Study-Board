<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Title' => $this->faker->title(),
            'Description' => $this->faker->text(),
            'Status' => $this->faker->randomElement(['start','in progress','finish']),
            'completed' => $this->faker->boolean(),
            'create_at' => now(),
            'user_id' =>  $this->faker->numberBetween(1,5),
        ];
    }
}
