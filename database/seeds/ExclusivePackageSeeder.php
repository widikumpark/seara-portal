<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExclusivePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('exclusive_packages')->delete();

        $packages = array(
        array('name'=>'Standard', 'cost'=>'50000', 'properties'=>"Up to 5% Discounts, 21 days processing timed, Min Order: 270 MT"),
        array('name'=>'Premium', 'cost'=>'100000', 'properties'=>"Up to 7% Discounts, 14 days processing time,  Min Order: 405 MT"),
        array('name'=>'Ultimate', 'cost'=>'500000', 'properties'=>"Up to 10% Discounts, 7 days processing time, L\C Invoice, Min Order: 1080 MT, Dedicated Order Manager"),
        array('name'=>'Ultra', 'cost'=>'1000000', 'properties'=>"Up to 15% Discounts, 3 days processing time,  L\C Invoice, Min Order: 2700 MT, Priorty Support, Dedicated Order Manager"));

        DB::table('exclusive_packages')->insert($packages);
    }
}