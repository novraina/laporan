<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tanggal', 'materi_pelatihan', 'ruangan', 'durasi', 'harga'
    ];
    
    protected $table = 'table_kelas';
}
