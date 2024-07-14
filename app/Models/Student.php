<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    //nombre del modelo que va estar relacionado con la tabla
    protected $table = 'student';

    //campos que van a poder ser alterados
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address'
    ];
}
