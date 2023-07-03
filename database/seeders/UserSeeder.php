<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:table('users')->insert([
            'name' => 'Manohar',
            'email' => 'manohar13@gmail.com',
            'password' => Hash::make('manohar13'),
            'role' => 'admin'
        ]);
    }
}
