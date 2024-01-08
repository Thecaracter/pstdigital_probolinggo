<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsultasiVirtual extends Model
{
    use HasFactory;
    protected $table = 'konsultasi_virtual';
    protected $fillable = ['nama', 'email', 'no_telp', 'instansi', 'pekerjaan', 'status'];
}
