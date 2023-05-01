<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(){
        return view('library.books.index',[
            'books' => Book::all()
        ]);
    }

    public function show(Book $book) {
        return view('library.books.show', compact('book'));
    }

    public function edit(Book $book){
        $authors = Author::all();
        $publishers = Publisher::all();

        return view('library.books.edit', compact('book', 'authors', 'publishers'));
    }

    public function update(Request $request,Book $book) {
        $book->title = $request->get('title');
        $book->isbn = $request->get('isbn');
        $book->description = $request->get('description');
        $book->dt_publication = $request->get('dt_publication');
        $publisher = Publisher::find($request->get('id_publisher')) ;
        $author = Author::find($request->get('id_author'));

        $book->author()->associate($author);
        $book->publisher()->associate($publisher);

        $book->save();

        return redirect('library.books.index');
    }

    public function create(){
        $book = new Book;
        $author = Author::all();
        $publisher = Publisher::all();

        view('library.books.edit', compact('book','author','publisher'));
    }

    public function store(Request $request) {
        $book = new Book();

        $book->title = $request->get('title');
        $book->isbn = $request->get('isbn');
        $book->description = $request->get('description');
        $book->dt_publication = $request->get('dt_publication');
        $publisher = Publisher::find($request->get('id_publisher')) ;
        $author = Author::find($request->get('id_author'));

        $book->author()->associate($author);
        $book->publisher()->associate($publisher);

        $book->save();

        return redirect('library.books.index');
    }
    public function destroy( Book $book){
        $book->delete();

        return redirect('library.books');
    }

}
