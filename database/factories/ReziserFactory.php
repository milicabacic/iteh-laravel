<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Film;
use App\Models\User;
use App\Models\Zanr;
use App\Models\Reziser;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reziser>
 */
class ReziserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ime'=>$this->faker->firstName(),
            'prezime'=>$this->faker->lastName(),
            'godinaRodjenja'=>$this->faker->year()
        ];
    }
}
