<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>1,
            'name'=>$this->faker->name,
            'email'=>$this->faker->email,
            'subject'=>$this->faker->text(10),
            'message'=>$this->faker->text(150),
        ];
    }
}
