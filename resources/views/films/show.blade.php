<!DOCTYPE html>
<html>
<head>
    <title>{{ $film->title }}</title>
</head>
<body>
<h1>{{ $film->title }}</h1>
<p>Directors:
    @foreach ($film->directors as $director)
        {{ $director->name }} {{ $director->surname }}
    @endforeach
</p>
@if(count($film->producers)>0||count($film->orgProducers)>0)
    <p>Producers:
        @foreach ($film->producers as $director)
            {{ $director->name }} {{ $director->surname }},
        @endforeach
        @foreach ($film->orgProducers as $director)
            {{ $director->name }}
        @endforeach
    </p>
@endif

<p>Publication Year: {{ date('Y', strtotime($film->release)) }}</p>
<p>Description: {{ $film->description }}</p>
<!-- Display other film details as needed -->
</body>
</html>
