<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class Register extends Model
{
    use HasFactory,Notifiable;

    protected $table = 'register_tb';

    protected $fillable = ['name', 'email', 'password', 'status'];

    protected $hidden = ['password'];
}
