<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UploadBook extends Model
{
    use HasFactory;
    protected $table = 'upload_books';
    protected $fillable = [
        'nama_buku',
        'file_buku',
        'image_buku',
        'kategori',
        'deskripsi_buku',
    ];

}
