<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory; // Tambahkan trait HasFactory untuk mendukung factory testing

    // Nama tabel (opsional, hanya perlu jika tabel bukan bentuk jamak dari nama model)
    protected $table = 'mahasiswas'; // Gunakan nama tabel yang sesuai di database

    // Kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'npm',
        'nama',
        'prodi',
    ];

    // Nonaktifkan timestamps jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = true; // Default Laravel adalah true, tidak perlu dinyatakan jika timestamps digunakan
}