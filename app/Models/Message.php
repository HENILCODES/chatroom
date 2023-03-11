<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Message extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'chat',
        'room_id',
        'user_id',
    ];

    public function getCreatedAtAttribute($value)
    {
        return date('d-M-Y h:i:s a', strtotime($value));
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function rooms(): BelongsToMany
    {
        return $this->belongsToManyo(Room::class);
    }
}
