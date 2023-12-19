<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalog'; // Sesuaikan dengan nama tabel yang Anda buat

    protected $fillable = [
        'nama_buku',
        'deskripsi',
        'tahun_terbit',
        'foto',
    ];
}
