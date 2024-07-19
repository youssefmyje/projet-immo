<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des annonces</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('partials.nav')
    <h1>Liste des annonces</h1>
    <div class="annonces">
        @foreach($annonces as $annonce)
        <div class="annonce">
            <h3>{{ $annonce->titre }}</h3>
            <p>{{ $annonce->description }}</p>
            <a href="{{ url('/listings/' . $annonce->id) }}">Voir les détails</a>
        </div>
        @endforeach
    </div>
</body>

</html>