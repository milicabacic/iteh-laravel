<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;
use App\Models\User;
use App\Models\Zanr;
use App\Models\Reziser;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Film::truncate();
        User::truncate();
        Reziser::truncate();
        Zanr::truncate();

        $this->call([
            ZanrSeeder::class
        ]);

        Film::factory(10)->create();
    }
}
