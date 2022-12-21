<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = [
            [
                'kode' => 1,
                'nama' => "Reguler",
            ],
            [
                'kode' => 2,
                'nama' => "Non Reguler",
            ],
        ];

        DB::table('kelas')->insert($kelas);
    }
}
