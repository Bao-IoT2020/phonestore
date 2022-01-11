<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_brand')->insert([
            array(
                'name' => 'Iphone',
                'description' => 'Đây là Iphone',
                'status' => 0
            ),
            array(
                'name' => 'Samsung',
                'description' => 'Đây là Samsung',
                'status' => 0
            ),
            array(
                'name' => 'Xiaomi',
                'description' => 'Đây là Xiaomi',
                'status' => 0
            ),
            array(
                'name' => 'OPPO',
                'description' => 'Đây là OPPO',
                'status' => 0
            ),
            array(
                'name' => 'Nokia',
                'description' => 'Đây là Nokia',
                'status' => 0
            ),
            array(
                'name' => 'ASUS',
                'description' => 'Đây là ASUS',
                'status' => 0
            )
        ]);
    }
}
