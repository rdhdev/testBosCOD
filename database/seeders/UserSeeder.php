<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::truncate();
        User::insert(
            [
                [
                    'username'    => 'admin1@getnada.com',
                    'password' => Hash::make('Admin123@')
                ],
                [
                    'username'    => 'admin2@getnada.com',
                    'password' => Hash::make('Admin123@')
                ],
                [
                    'username'    => 'admin3@getnada.com',
                    'password' => Hash::make('Admin123@')
                ],
            ]
        );
    }
}
