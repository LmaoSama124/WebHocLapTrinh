<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_users';

    protected $fillable = [
        'fullname', 'displayname', 'username', 'email', 'password', 'phone', 'avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
