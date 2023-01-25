<?php

namespace Database\Seeders;

use App\Models\RekeningAdmin;
use Illuminate\Database\Seeder;

class RekeningAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RekeningAdmin::truncate();
        RekeningAdmin::insert([
            [
                'user_id'       => 1,
                'bank_id'       => 1,
                'nama'          => 'Yuli',
                'nomor_rekening'=> '014223401924'
            ],
            [
                'user_id'       => 1,
                'bank_id'       => 2,
                'nama'          => 'Yuli',
                'nomor_rekening'=> '022348388829'
            ],
        ]);
    }
}
