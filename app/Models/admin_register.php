<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class admin_register extends Model
{
     use HasFactory;

     protected $table = 'admin_register_tb';

     protected $fillable = ['email', 'password'];
}
