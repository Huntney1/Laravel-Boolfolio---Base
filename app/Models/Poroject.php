<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poroject extends Model
{
    use HasFactory;

    //! Definisco i campi assegnati del Model Project
    protected $fillable = [
        'title',
        'description',
        'image',
        'url',
    ];
}
