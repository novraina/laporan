<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip', 'nama_instruktur', 'materi_pelatihan'
    ];

    protected $table = 'table_instruktur'; 
}
