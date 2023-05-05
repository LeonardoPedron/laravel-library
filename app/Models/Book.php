<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public static function where(string $string, string $string1, string $string2, string $string3, )
    {
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    protected $fillable = ['title','isbn','description','dt_publication','publisher_id','author_id','updated_at','created_at'];
}
