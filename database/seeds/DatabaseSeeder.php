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
        $this->call(EmployesTableSeeder::class);
        $this->call(SitesTableSeeder::class);
        $this->call(GroupesTableSeeder::class);    
        $this->call(DepartementsTableSeeder::class);
    }
}
