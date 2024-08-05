<!DOCTYPE html>
<html>
<head>
    <title>Ordini</title>
</head>
<body>
    <h1>Lista degli Ordini</h1>
    <a href="{{ route('ordini.create') }}">Aggiungi Ordine</a>
    <ul>
        @foreach($ordini as $ordine)
            <li>
                Tavolo: {{ $ordine->tavolo->numero }} - 
                @foreach($ordine->piatti as $piatto)
                    Piatto: {{ $piatto->nome }} (Quantità: {{ $piatto->pivot->quantita }})
                @endforeach
            </li>
        @endforeach
    </ul>
</body>
</html>
