<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal', 'nim', 'nama_peserta', 'jurusan', 'nip', 'nama_instruktur', 'materi_pelatihan', 'harga'
    ];
    
    protected $table = 'table_laporan';
}
