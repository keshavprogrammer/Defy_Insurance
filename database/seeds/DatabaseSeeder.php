<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Admin table seeder
        //$this->call(AdminTableSeeder::class);
        // How hear about us seeder
        //$this->call(HowHearAboutsTableSeeder::class);
         $this->call(StaticpageTableSeeder::class);
    }
}
