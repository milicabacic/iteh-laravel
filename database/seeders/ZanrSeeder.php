<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZanrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zanr1=\App\Models\Zanr::create([
            'naziv_zanra' => "drama"
        ]);

        $zanr2=\App\Models\Zanr::create([
            'naziv_zanra' => "triler"
        ]);

        $zanr3=\App\Models\Zanr::create([
            'naziv_zanra' => "horor"
        ]);

        $zanr4=\App\Models\Zanr::create([
            'naziv_zanra' => "naucna fantastika"
        ]);

        $zanr5=\App\Models\Zanr::create([
            'naziv_zanra' => "komedija"
        ]);

        $zanr6=\App\Models\Zanr::create([
            'naziv_zanra' => "animirani"
        ]);
    }
}
