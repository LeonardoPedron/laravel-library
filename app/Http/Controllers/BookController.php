<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(Request $request){
        $books = Book::query();
        $authors = Author::query();
        $search = $request->input('search_book');

        if ($request->has('search_book')){
                $books->where('title', 'LIKE', '%'. $search.'%')
                    ->orWhere('author_id','LIKE','%'.$search.'%')
                        ->get();
        }

        $books = $books->get(['id','title','isbn','description','dt_publication','publisher_id','author_id']);

        return view('library.books.index',compact('books'));

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

}
