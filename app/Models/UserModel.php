<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class UserModel extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    protected $table =('_users');
    protected $fillable = [
        'fullName',
        'userName',
        'email',
        'active',
        'password',
        'email_verified_at' => 'datetime',
        'verification_token'
        ];
}
