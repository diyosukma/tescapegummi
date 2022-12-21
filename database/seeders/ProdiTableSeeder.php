<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodi = [
            [
                'kode' => "01",
                'nama' => "Teknik Sipil",
            ],
            [
                'kode' => "02",
                'nama' => "Kimia",
            ],
            [
                'kode' => "03",
                'nama' => "Agribisnis",
            ],
            [
                'kode' => "04",
                'nama' => "Agrikultur",
            ],
            [
                'kode' => "05",
                'nama' => "Teknik Informatika",
            ],
            [
                'kode' => "06",
                'nama' => "Akuntansi",
            ],
            [
                'kode' => "07",
                'nama' => "Administrasi Publik",
            ],
            [
                'kode' => "08",
                'nama' => "Administrasi Bisnis",
            ],
            [
                'kode' => "09",
                'nama' => "Sastra Inggris",
            ],
            [
                'kode' => "10",
                'nama' => "Pendidikan Biologi",
            ],
            [
                'kode' => "11",
                'nama' => "Keperawatan",
            ],
            [
                'kode' => "12",
                'nama' => "Perpajakan",
            ],
            [
                'kode' => "13",
                'nama' => "Pendidikan Bahasa dan Sastra Indonesia",
            ],
            [
                'kode' => "14",
                'nama' => "Pendidikan Matematika",
            ],
            [
                'kode' => "15",
                'nama' => "Pendidikan Guru Pendidikan Anak Usia Dini",
            ],
            [
                'kode' => "16",
                'nama' => "Pendidikan Guru Sekolah Dasar",
            ],
            [
                'kode' => "17",
                'nama' => "Pendidikan Teknologi Informasi",
            ],
            [
                'kode' => "18",
                'nama' => "Pendidikan Jasmani Kesehatan dan Rekreasi",
            ],
        ];

        DB::table('prodi')->insert($prodi);
    }
}
