<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $mahasiswa = DB::table('mahasiswa')
            ->join('prodi', 'prodi.id', '=', 'mahasiswa.prodi_id')
            ->join('kelas', 'kelas.id', '=', 'mahasiswa.kelas_id')
            ->join('jenjang', 'jenjang.id', '=', 'mahasiswa.jenjang_id')
            ->select(
                'mahasiswa.nim AS nim_mahasiswa',
                'mahasiswa.nama AS nama_mahasiswa',
                'mahasiswa.tahun AS tahun_masuk',
                'prodi.nama AS nama_prodi',
                'kelas.nama AS nama_kelas',
                'jenjang.nama AS nama_jenjang'
            )
            ->get();

        return $mahasiswa;
    }

    public function headings(): array
    {
        return [
            'NIM',
            'NAMA',
            'TAHUN MASUK',
            'PROGRAM STUDI',
            'KELAS',
            'JENJANG',
        ];
    }
}
