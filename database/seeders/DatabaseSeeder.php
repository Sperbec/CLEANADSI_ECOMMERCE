<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //$this->call(ProductoSeeder::class);
        $arrays = range(0,20);
        foreach ($arrays as $valor) {
            DB::table('productos')->insert([	            
                'nombre' => Str::random(10),
                'descripcion' => Str::random(10),
                'sku' => Str::random(10),
                'estado' => rand(0,1),
                'precio' => rand(1000,30000),
                'cantidad_existencia' => rand(1, 900),
                'imagen'=>Str::image(640,480,null,false),
                'id_categoria' => rand(2,3),
            ]);
        }
    }
}