<!DOCTYPE html>
<html>
<head>
    <title>Crea Tavolo</title>
</head>
<body>
    <h1>Crea Tavolo</h1>
    <form action="{{ route('tavoli.store') }}" method="POST">
        @csrf
        <label>Numero Tavolo:</label>
        <input type="text" name="numero"><br>
        <label>Posti:</label>
        <input type="number" name="posti"><br>
        <button type="submit">Salva</button>
    </form>
</body>
</html>
