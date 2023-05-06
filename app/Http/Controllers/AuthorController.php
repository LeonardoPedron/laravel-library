<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Identification;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request){
        $authors = Author::query();

        if ($request->has('name')) {
            $authors->whereHas('identification', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('name') . '%')
                    ->orWhere('surname', 'like', '%' . $request->input('name') . '%');
            });
        }

        $authors = $authors->get(['id', 'degree', 'dt_death', 'identification_id']);

        return view('library.authors.index', compact('authors'));
    }

    public function show(Author $author){
        return view('library.authors.show', compact('author'));
    }
}
