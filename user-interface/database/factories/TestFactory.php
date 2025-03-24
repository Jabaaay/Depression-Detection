<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    protected $model = Test::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'college' => $this->faker->word(),
            'course' => $this->faker->word(),
            'age' => $this->faker->numberBetween(18, 30),
            'contact_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}

