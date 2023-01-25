<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Regions')->insert([
            [
                "code" => "TUxDUEFJU04xNGU1NA",
                "name" => "Aysén",
            ],
            [
                "code" => "TUxDUEFOVEE3NWZk",
                "name" => "Antofagasta",
            ],
            [
                "code" => "TUxDUEFZUEE3NWZk",
                "name" => "Arica y Parinacota",
            ],
            [
                "code" => "TUxDUEFUQUE4YjAw",
                "name" => "Atacama",
            ],
            [
                "code" => "TUxDUERFTE9lODZj",
                "name" => "Biobío",
            ],
            [
                "code" => "TUxDUENISTI1Y2hpMg",
                "name" => "China",
            ],
            [
                "code" => "TUxDUENPUU84MzQx",
                "name" => "Coquimbo",
            ],
            [
                "code" => "TUxDUElORzI1Y2hpMg",
                "name" => "Inglaterra",
            ],
            [
                "code" => "TUxDUEFSQUE3YzVk",
                "name" => "La Araucanía",
            ],
            [
                "code" => "TUxDUE9IUzFjODg",
                "name" => "Libertador B. O'Higgins",
            ],
            [
                "code" => "TUxDUExPU1NmYjk5",
                "name" => "Los Lagos",
            ],
            [
                "code" => "TUxDUExTUkE3NWZk",
                "name" => "Los Ríos",
            ],
            [
                "code" => "TUxDUE1BR1MxN2UxNw",
                "name" => "Magallanes",
            ],
            [
                "code" => "TUxDUERFTEVkN2Yy",
                "name" => "Maule",
            ],
            [
                "code" => "TUxDUE1FVEExM2JlYg",
                "name" => "RM (Metropolitana)",
            ],
            [
                "code" => "TUxDUFRBUkFhZDJi",
                "name" => "Tarapacá",
            ],
            [
                "code" => "TUxDUFVTQTI1Y2hpMg",
                "name" => "USA",
            ],
            [
                "code" => "TUxDUFZBTE84MDVj",
                "name" => "Valparaíso",
            ],
            [
                "code" => "TUxDUERFTExNUBLE",
                "name" => "Ñuble",
            ],
        ]);
    }
}
