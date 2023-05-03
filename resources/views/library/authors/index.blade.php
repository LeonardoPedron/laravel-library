<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v6.1.0/css/pro.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container p-3">
        <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="row mb-4 mt-2">
                <div class="col-6">
                    <a href="authors/create">
                        <div class="btn btn-primary rounded-circle">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <form class="d-flex" role="search" method="POST">
                        <input class="form-control me-2" type="search"  name="name" id="name" placeholder="Search Author" aria-label="Search">
                        <button class="btn btn-primary" type="submit"><span><i class="fa-solid fa-magnifying-glass"></i></span></button>
                    </form>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Degree</th>
                    <th scope="col">Death Date</th>
                    <th scope="col" colspan="3" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->identification->name }}</td>
                        <td>{{ $author->identification->surname }}</td>
                        <td>{{ $author->degree ?? 'NULL'}}</td>
                        <td>{{ $author->dt_death ?? 'NULL'}}</td>
                        <td class="text-center">
                            <a href="authors/{{ $author->id }}">
                                <span class="text-dark"><i class="fa-solid fa-eye"></i></span>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="authors/{{ $author->id }}/edit">
                                <span class="text-primary"><i class="fa-solid fa-pencil"></i></span>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="#">
                                <span class="text-danger"><i class="fa-solid fa-trash"></i></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
