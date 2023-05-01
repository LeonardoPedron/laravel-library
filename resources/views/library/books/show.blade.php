<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v6.1.0/css/pro.min.css">
    <title>Book detail {{$book->id}}</title>
</head>
<body>
<div>
    <h1>{{$book->title}}</h1>  <h4>{{$book->isbn}}</h4>
</div>
<div>
    <p> Preview: {{$book->description}}</p>
</div>
<div>
    <p>Publischer : {{$book->publisher->name}}</p>
</div>
<div>
    <p>Autore : {{$note->author->name}}</p>
</div>
</body>
</html>

