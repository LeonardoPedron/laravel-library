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
        $book->update($request->all());

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
        $publisher = Publisher::find($request->get('publisher_id')) ;
        $author = Author::find($request->get('author_id'));

        $book->author()->associate($author);
        $book->publisher()->associate($publisher);

        $book->save();

        return redirect('library.books.index');
    }
    public function destroy( Book $book){
        $book->delete();

        return redirect('library.books');
    }

    public function searchBook(Request $request) {
        // $request va a puntare al name dell'input dato che è di tipo search tramite un magic method
        $search_book = $request->search_book;

        if($search_book !== ""){
           $book = Book::where('title','isbn','description','LIKE',"%$search_book%")->get();
        }
        else{
            return redirect('library.books');
        }
    }

}
