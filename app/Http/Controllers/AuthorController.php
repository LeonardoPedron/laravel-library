<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Identification;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $request = Request::capture();

        return view('library.authors.index',[
            'authors' => Author::all()
        ]);
    }

    public function show(Author $author){
        return view('library.authors.show', compact('author'));
    }
}
