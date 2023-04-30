<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identification extends Model
{
    use HasFactory;

    public function Country(){
        return $this->belongsTo(Country::class);
    }

    public function Author(){
        return $this->hasMany(Author::class);
    }
}
