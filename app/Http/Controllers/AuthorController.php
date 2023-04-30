<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        return view('library.authors.index',[
            'authors' => Author::all()
        ]);
    }

    public function show(Author $author){
        return view('library.authors.show', compact('author'));
    }
}
