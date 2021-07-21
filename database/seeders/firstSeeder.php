<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class firstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        [
            'name' => 'Mandip Gurung',
            'email' => 'mandip@gmail.com',
            'password' => Hash::make('qwe'),
        ],
        [
            'name' => 'Rishi Rai',
            'email' => 'rishi@gmail.com',
            'password' => Hash::make('qwerty'),
        ],
        ]);
    }
}
