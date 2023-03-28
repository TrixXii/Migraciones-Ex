<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        //Generar 10 usuarios aleatorios
        for ($i = 0; $i < 10; $i++) {

            DB::table('users')->insert([   
                'name' => $faker->userName(),
                'email' => $faker->unique()->safeEmail,
                //Fecha en la creacion del usuario
                //dateTimeBetween() para generar una fecha y hora aleatoria entre dos fechas
                'email_verified_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                'password' => $faker->password(),
                //Utilizar el metodo sha256 para crear un hash aleatorio
                'remember_token' => hash('sha256', $faker->randomNumber()),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
