<!-- resources/views/films/index.blade.php -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset('css/styleFilm.css') }}>
    <title>Lista film</title>
</head>
<body>
    <h1>Lista degli audiovisivi</h1>
    <div class="grid-container">
        @foreach($films as $film)
            <a href="{{route("films.show",["film"=> $film->id])}}" style="color: #000; text-decoration: none">
            <div class="film">
                <div class="film-title" >{{ $film->title }}</div>
                <strong>Regista:</strong>
                <ul class="director-list">
                    @foreach($film->directors as $director)
                        @if($director->name)
                            <li>{{ $director->name }} {{ $director->surname }}</li>
                        @endif
                    @endforeach
                </ul>
                <strong>Anno di Pubblicazione:</strong> {{ $film->release->format('Y') }}
            </div>
            </a>
        @endforeach
    </div>
</body>
</html>
