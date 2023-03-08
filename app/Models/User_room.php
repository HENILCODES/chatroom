<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_room extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'rooms_id',
        'users_id',
        'type'
    ];
}
