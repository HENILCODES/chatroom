<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'name',
        'users_id',
        'photo',
    ];
    protected $primaryKey ='id';

    public function getCreatedAtAttribute($value)
    {
        return date('d-M-Y h:i:s a', strtotime($value));
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
