<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = DB::table('users')->get();
        $events = DB::table('events')->get();

        foreach ($events as $event) {
            // para cada evento, elegir un usuario aleatorio
            $user = $faker->randomElement($users);
            DB::table('user_event_attendees')->insert([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
