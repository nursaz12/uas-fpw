<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Nama tabel sesuai dengan yang ada di database
    protected $table = 'mahasiswas';

    // Kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'npm',
        'nama',
        'prodi',
    ];

    // Nonaktifkan timestamps jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = true;
}
