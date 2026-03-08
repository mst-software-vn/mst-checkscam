<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'full_name',
        'role',
        'status',
    ];

    protected $hidden = ['password', 'remember_token'];

    // Helper check role — dùng ở nhiều chỗ
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isModerator(): bool
    {
        return $this->role === 'moderator';
    }

    // Quan trọng: check status trước khi cho login
    public function isActive(): bool
    {
        return $this->status === 1;
    }
}
