<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim', 'nama_peserta', 'jurusan', 'materi_pelatihan'
    ];

    protected $table = 'table_peserta'; 
}
