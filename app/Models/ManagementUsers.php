<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementUsers extends Model
{
    use HasFactory;

    protected $table = 'users'; // Sesuaikan dengan nama tabel
    protected $primaryKey = 'user_id'; // Ganti 'user_id' sesuai dengan kolom yang ada
    protected $fillable = [
        'foto',
        'name',
        'email',
        'password',
        'idroles',
        'gender',
        'phone_number',
        'bio'
    ];

    public function role()
    {
        return $this->belongsTo(ManagementRoles::class, 'idroles', 'id');
    }
}
