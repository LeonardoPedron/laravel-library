<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v6.1.0/css/pro.min.css">
    <title>Lists Books</title>
</head>
<body>
    <table class="table table-striped table-hover" >
        <thead>
        <tr class="text-center">
            <th>Titolo</th>
            <th>ISBN</th>
            <th>Description</th>
            <th>Date Publication</th>
            <th>Publisher</th>
            <th>Author</th>
            <th colspan="3">Azioni</th>
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
                <td><a href="/books/{{ $book->id }}"><i class="fa-thin fa-eye"></i></a></td>
                <td><a href="/books/{{ $book->id }}/edit"><i class="fa-thin fa-pencil"></i></a></td>
                <td>
                    <form method="post" action="/books/{{$book->id}}">
                        @csrf
                        @method('delete')
                        <button type="submit"><i class="fa-thin fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


</body>
</html>
