<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenjangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenjang = [
            [
                'kode' => 1,
                'nama' => "S3",
            ],
            [
                'kode' => 2,
                'nama' => "S2",
            ],
            [
                'kode' => 3,
                'nama' => "S1",
            ],
            [
                'kode' => 4,
                'nama' => "D3",
            ],
            [
                'kode' => 5,
                'nama' => "D2",
            ],
            [
                'kode' => 6,
                'nama' => "D1",
            ],
        ];

        DB::table('jenjang')->insert($jenjang);
    }
}
