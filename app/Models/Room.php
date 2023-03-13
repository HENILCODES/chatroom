<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;
    public $fillable = [
        'id',
        'name',
        'created_by',
        'photo',
    ];
    protected $primaryKey ='id';

    public function getCreatedAtAttribute($value)
    {
        return date('d-M-Y h:i:s a', strtotime($value));
    }
    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    function messages():HasMany{
        return $this->hasMany(Message::class);
    }
}
