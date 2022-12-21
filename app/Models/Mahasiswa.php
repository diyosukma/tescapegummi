<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nim',
        'nama',
        'tahun',
        'prodi_id',
        'jenjang_id',
        'kelas_id',
        'semester',
    ];

    public function prodi()
    {
        return $this->hasOne(Prodi::class, 'id', 'prodi_id');
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'kelas_id');
    }

    public function jenjang()
    {
        return $this->hasOne(Jenjang::class, 'id', 'jenjang_id');
    }
}
