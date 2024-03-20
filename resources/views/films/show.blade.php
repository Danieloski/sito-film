<!DOCTYPE html>
<html lang="it">
<head>
    <title>{{ $film->title }}</title>
    <link rel="stylesheet" href={{ asset('css/styleFilm.css') }}>
</head>
<body>
<div class="film">
<h1 class="titolo-film">{{ $film->title }}</h1>
<p>Diretto:
    @foreach ($film->directors as $director)
        {{ $director->name }} {{ $director->surname }}
    @endforeach
</p>
@if(count($film->producers)>0||count($film->orgProducers)>0)
    <p>Prodotto:
        @foreach ($film->producers as $director)
            {{ $director->name }} {{ $director->surname }},
        @endforeach
        @foreach ($film->orgProducers as $director)
            {{ $director->name }}
        @endforeach
    </p>
@endif
    @if($film->length!=0)
        <p>Durata: {{$film->length}} minuti</p>
    @endif
    @if($film->category!=0)
        <p>Categoria:
        @foreach($film->categories as $category)
            {{$category->name }}
        @endforeach
        </p>
    @endif
    <p>Anno: {{ date('Y', strtotime($film->release)) }}</p>
    <p>Descrizione:
        @if (strpos($film->description, 'https://') !== false || strpos($film->description, 'http://') !== false)
            <a href="{{ $film->description }}">Collegamento alla fonte</a>
        @else
            {{ $film->description }}
        @endif
    </p>
</div>
</body>
</html>
