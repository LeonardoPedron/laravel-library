<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public function identification(){
        return $this->belongsTo(Indetification::class);
    }
    public function book(){
        return $this->hasMany(Book::class);
    }
}
