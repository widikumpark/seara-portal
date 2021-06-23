<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        //
        DB::table('users')->insert([
            'name' => 'SEARA International',
            'email' => 'export@searaalimentos.br.com',
            'phone'=>'',
            'company_name'=>'SEARA Alimentos',
            'password' => Hash::make('Thomas12@'),
        ]);
    }
}