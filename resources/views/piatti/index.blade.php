<!DOCTYPE html>
<html>
<head>
    <title>Piatti</title>
</head>
<body>
    <h1>Lista dei Piatti</h1>
    <a href="{{ route('piatti.create') }}">Aggiungi Piatto</a>
    <ul>
        @foreach($piatti as $piatto)
            <li>{{ $piatto->nome }} - Prezzo: €{{ $piatto->prezzo }}</li>
        @endforeach
    </ul>
</body>
</html>
