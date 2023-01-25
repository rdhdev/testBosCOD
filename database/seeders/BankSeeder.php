<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::truncate();
        Bank::insert([
            [
                'nama' => 'BCA'
            ],
            [
                'nama' => 'BNI'
            ],
            [
                'nama' => 'BRI'
            ],
            [
                'nama' => 'Mandiri'
            ]
        ]);
    }
}
