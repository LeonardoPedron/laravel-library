<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v6.1.0/css/pro.min.css">
    <title>Edit Book {{$book->id}}</title>
</head>
<body>
<div class="mb-3">
    <form action="/notes{{$book->id ? '/'. $book->id : ''}}" method="post">
        @if ( $book->id) @method('PATCH') @endif
        @csrf   <!--chiave univica che fa rimandare al form la stessa chiave-->
        <div>
            <label class="form-label" for="title">Title</label>
            <input class="form-control" type="text" placeholder="Title" aria-label="Title" id="title" name="title" value="{{$book->title}}">
        </div>
        <div>
            <label class="form-label" for="isbn">ISBN</label>
            <input class="form-control" type="text" placeholder="isbn" aria-label="isbn" id="isbn" name="isbn" value="{{$book->isbn}}">
        </div>
        <div>
            <label class="form-label" for="description">Description</label>
            <textarea type="content" name="description" id="description" >{{$book->description}}</textarea>>
        </div>
        <div>
            <label class="form-label" for="dt_publication">Date Publication</label>
            <input type="date" name="dt_publication" id="dt_publication" value="{{$book->dt_publication}}">
        </div>
        <div>
            <label for="id_publisher">Publisher</label>
            <select name="id_publisher" id="id_publisher" required>
                <option value=""></option>
                @foreach($publishers as $publisher )
                    <option {{$publisher->id == $book->publisher?->id ? 'selected' : ''}} value="{{$publisher->id}}" >{{$publisher->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="author_id">Author</label>
            <select name="id_author" id="id_author" required>
                <option value=""></option>
                @foreach($authors  as $author)
                    <option {{$author->id == $author->author?->id ? 'selected' : ''}} value="{{$author->id}}">{{$author->identification->name}} ." ". {{$author->identification->surname}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <button class="btn btn primary" type="submit">Save your edit</button>
        </div>
    </form>
</div>
</body>
</html>
