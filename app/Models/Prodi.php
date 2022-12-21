<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    protected $primaryKey = 'id';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
