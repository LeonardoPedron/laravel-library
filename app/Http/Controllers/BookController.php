<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //

    public function index(){

        return view('library.books.index',[
            'books' => Book::all()
        ]);
    }

    public function show(Book $book) {

        return view('books.show', compact('book'));

    }

    public function edit(Book $book /* int $key*/){

        $authors = Author::all();

        // $note = Note::find($key);  // questa nella nostra biblioteca corrisponde al GetById

        return view('book.edit', compact('book', 'authors'));

    }

    public function update(Request $request,Book $book) {

        $book->title = $request->get('title');
        $book->isbn = $request->get('isbn');
        $book->description = $request->get('description');
        $book->dt_publication = $request->get('dt_publication');
        $book->id_publisher = Publisher::find($request->get('dt_publication')) ;
        $author = Author::find($request->get('id_author'));

        $book->Author()->associate($author);

        $book->save();

        return redirect('library.books.index');

    }

    public function create(){
        $book = new Book;
        $author = Author::all();
        $publisher = Publisher::all();

        view('library.book.edit', compact('book','author','publisher'));

    }

}
