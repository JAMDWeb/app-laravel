<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Siembra de los datos
        DB::table('users')->insert([
            'name' =>Str::random(8),
            'email' =>Str::random(8) . '@gmail.com',
            'password'=> Hash::make('password')

        ]);
    }
}
