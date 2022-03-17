<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Film;
use App\Models\User;
use App\Models\Zanr;
use App\Models\Reziser;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'naslov'=>$this->faker->word(),
            'produkcija'=>$this->faker->word(),
            'godina_premijere'=>$this->faker->numberBetween(1970,2022),
            'reziser_id'=>Reziser::factory(),
            'zanr_id'=>$this->faker->numberBetween(1,6),
            'user_id'=>User::factory()
         ];
    }
}
