<?php

namespace App\Models;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    use FormAccessible;

    public $fillable = [
        'name',
        'password',
        'email',
        'contact',
        'semester',
        'hobby',
        'gender',
        'color',
        'interest',
        'dob',
        'month',
        'url',
        'photo',
    ];
    function getNameAttribute($value){
        return $value;
    }
}
