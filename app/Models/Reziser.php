<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reziser extends Model
{
    use HasFactory;

    protected $fillable = [
        'ime',
        'prezime',
        'godinaRodjenja'
    ];
}
