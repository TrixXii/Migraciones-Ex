<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        //Generar 10 event aleatorios
        for ($i = 0; $i < 10; $i++) {
            $userIds = DB::table('users')->pluck('id');
            DB::table('events')->insert([
                'title'=>$faker->title(),
                'description' => $faker->text(),
                'location' => $faker->address(),
                'date' => $faker->date('Y-m-d'),
                'user_id' => $faker->randomElement($userIds),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}