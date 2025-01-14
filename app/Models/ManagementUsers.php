<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

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
        'role_id',
        'gender',
        'phone_number',
        'bio'
    ];

    // Relasi ke Role
    public function role()
    {
        return $this->belongsTo(role::class, 'role_id');
    }
}
