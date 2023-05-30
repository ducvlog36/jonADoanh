<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MstUerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('mst_user')->insert([
            [
                'name' => 'doanhd',
                'email' => 'doanhnd@gmail.com',
                'password' => '12345678',
            ],
        ]);
    }
}
