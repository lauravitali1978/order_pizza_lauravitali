<!DOCTYPE html>
<html>
<head>
    <title>Tavoli</title>
</head>
<body>
    <h1>Lista dei Tavoli</h1>
    <a href="{{ route('tavoli.create') }}">Aggiungi Tavolo</a>
    <ul>
        @foreach($tavoli as $tavolo)
            <li>{{ $tavolo->numero }} - Posti: {{ $tavolo->posti }}</li>
        @endforeach
    </ul>
</body>
</html>
