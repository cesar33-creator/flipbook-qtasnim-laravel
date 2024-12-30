<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'upload_files';

    // Tentukan primary key
    protected $primaryKey = 'idbuku';

    // Jika primary key bukan auto-increment
    public $incrementing = false;

    // Jika tipe primary key bukan integer
    protected $keyType = 'string';

    // Kolom-kolom yang dapat diisi
    protected $fillable = [
        'nama_buku',
        'file_buku',
        'image_buku',
        'deskripsi_buku',
        'kategori',
    ];
}
