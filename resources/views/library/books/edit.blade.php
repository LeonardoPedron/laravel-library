<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v6.1.0/css/pro.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Edit Book {{$book->id}}</title>
</head>
<body>
    <h1 class="text-center">Edit current book</h1>
    <div class="container p-3">
        <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <form action="/books{{$book->id ? '/'. $book->id : ''}}" method="post">
                @if ( $book->id) @method('PATCH') @endif
                @csrf
                <div>
                    <label class="form-label" for="title">Title</label>
                    <input class="form-control" type="text" placeholder="Title" aria-label="Title" id="title" name="title" value="{{$book->title}}">
                </div>
                <div>
                    <label class="form-label" for="isbn">ISBN</label>
                    <input class="form-control" type="text" placeholder="isbn" aria-label="isbn" id="isbn" name="isbn" value="{{$book->isbn}}">
                </div>
                <div >
                    <label class="form-label" for="description"  > Book Description</label>
                    <textarea class="form-control" type="content" name="description" id="description" style="height: 100px" >{{$book->description}}</textarea>
                </div>
                <div>
                    <label class="form-label" for="dt_publication">Date Publication</label>
                    <input class="form-control" type="date" name="dt_publication" id="dt_publication" value="{{$book->dt_publication}}">
                </div>
                <div>
                    <label class="form-label" for="id_publisher">Publisher</label>
                    <select class="form-select" aria-label="Default select example" name="id_publisher" id="id_publisher" required>
                        <option selected value="">Choose publisher</option>
                        @foreach($publishers as $publisher )
                            <option {{$publisher->id == $book->publisher?->id ? 'selected' : ''}} value="{{$publisher->id}}" >{{$publisher->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label" for="author_id">Author</label>
                    <select class="form-select" aria-label="Default select example" name="id_author" id="id_author" required>
                        <option selected value="">Choose author</option>
                        @foreach($authors  as $author)
                            <option {{$author->id == $author->author?->id ? 'selected' : ''}} value="{{$author->id}}">{{$author->identification->name}} {{$author->identification->surname}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="margin-top: 25px" >
                    <button class="btn btn-primary" type="submit">Save your edit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
