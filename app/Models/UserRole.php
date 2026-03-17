<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class UserRole extends Model
{
 use HasFactory, Notifiable;

    protected $fillable = [
        'role_code',
        'role_name',
        'user_id',
        'role_id',
        'client_id',
        'merchant_id',
        'outlet_id',
    ];
}
