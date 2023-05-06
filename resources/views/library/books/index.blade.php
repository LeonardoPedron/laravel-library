<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v6.1.0/css/pro.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Lists Books</title>
</head>
<body>
<div class="container p-3" >
    <div class="shadow p-3 mb-5 bg-body-tertiary rounded" >
        <div class="row mb-4 mt-2">
            <div class="col-6">
                <a href="books/create">
                    <div class="btn btn-primary rounded-circle">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                </a>
            </div>
            <div class="col-6 search-bar">
                    <form class="d-flex" role="search" method="POST" action="/books.searchBook">
                        @csrf
                        <input class="form-control me-2" type="search"  name="search_book" id="name" placeholder="Search Book" aria-label="Search" >
                        <button class="btn btn-primary" type="submit"><span><i class="fa-solid fa-magnifying-glass"></i></span></button>
                    </form>
            </div>
        </div>
        <table class="table table-striped table-hover" >
            <thead>
            <tr class="text-center">
                <th scope="col">Titolo</th>
                <th scope="col">ISBN</th>
                <th scope="col">Description</th>
                <th scope="col">Date Publication</th>
                <th scope="col">Publisher</th>
                <th scope="col">Author</th>
                <th scope="col" colspan="3" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{substr($book->description,0,100)}}</td>
                    <td>{{ $book->dt_publication }}</td>
                    <td>{{ $book->publisher->name }}</td>
                    <td>{{$book->author->identification->name}} {{$book->author->identification->surname}} </td>
                    <td class="text-center">
                        <a href="/books/{{ $book->id }}">
                            <span class="text-dark"><i class="fa-solid fa-eye"></i></span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="/books/{{ $book->id }}/edit">
                            <span class="text-primary"><i class="fa-solid fa-pencil"></i></span>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="/books/{{$book->id}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="unset-style">
                                <span class="text-danger"><i class="fa-solid fa-trash-alt"></i></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
