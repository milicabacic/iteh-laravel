<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'naslov',
        'produkcija',
        'godina_premijere'
    ];

    public function reziser(){
        return $this->belongsTo(Reziser::class);
    }
 
    public function zanr(){
        return $this->belongsTo(Zanr::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
