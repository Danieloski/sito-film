<!-- resources/views/films/index.blade.php -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Griglia di Film</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-gap: 20px;
        }
        .film {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .film-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .director-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
            font-style: italic;
        }
        .director-list li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>Griglia di Film</h1>
    <div class="grid-container">
        @foreach($films as $film)
            <a href="{{route("films.show",["film"=> $film->id])}}" style="color: #000; text-decoration: none">
            <div class="film">
                <div class="film-title">{{ $film->title }}</div>
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
