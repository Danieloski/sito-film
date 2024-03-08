<!-- resources/views/films/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Films</title>
</head>
<body>
<h1>List of Films</h1>
<ol>
    @foreach($films as $film)
        <li>
            <strong>{{ $film->title }}</strong>
            - Directed by:
            @foreach($film->directors as $director)
                {{ $director->name }} {{ $director->surname }}
                @if(!$loop->last){{','}}@endif
            @endforeach
        </li>
    @endforeach
</ol>
</body>
</html>
