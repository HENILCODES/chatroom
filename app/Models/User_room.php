<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_room extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'room_id',
        'user_name',
        'type'
    ];
}
