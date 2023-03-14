<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'message_id',
    ];
    function messages(): HasOne
    {
        return $this->hasOne(Message::class);
    }
}
