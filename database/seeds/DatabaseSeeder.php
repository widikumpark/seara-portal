<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ///remove product seeder in development
            // ProductSeeder::class,
            CountriesSeeder::class,
            PortsSeeder::class,
            UserSeeder::class,
            ExclusivePackageSeeder::class

        ]);
    }
}