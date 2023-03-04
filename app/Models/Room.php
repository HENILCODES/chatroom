<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'name',
        'user_id',
        'photo',
    ];
    public function getCreatedAtAttribute($value)
    {
        return date('d-M-Y h:i:s a', strtotime($value));
    }
}
