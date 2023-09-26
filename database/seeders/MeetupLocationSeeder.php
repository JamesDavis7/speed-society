<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeetupLocationSeeder extends Seeder
{
    public function run()
    {
        $now = now();

        DB::table('meetups_locations')->insert([
            ['location' => 'London', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Birmingham', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Manchester', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Glasgow', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Liverpool', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Leeds', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Newcastle', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Sheffield', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Bristol', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Cardiff', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Edinburgh', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Belfast', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
