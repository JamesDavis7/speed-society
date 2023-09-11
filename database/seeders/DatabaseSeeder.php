<?php
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GroupSeeder;
use Database\Seeders\MeetupSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            GroupSeeder::class,
            MeetupSeeder::class,
        ]);
    }
}
