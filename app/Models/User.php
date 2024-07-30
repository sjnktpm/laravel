<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes trait

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes; // Add SoftDeletes trait

    // ...
}
