<!-- resources/views/annonces/show.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $annonce->titre }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('partials.nav')

    <div class="container mt-5">
        <h1>{{ $annonce->titre }}</h1>
        <p><strong>Description:</strong> {{ $annonce->description }}</p>
        <p><strong>Prix:</strong> {{ $annonce->prix }} €</p>
        <p><strong>Localisation:</strong> {{ $annonce->localisation }}</p>
        <p><strong>Surface:</strong> {{ $annonce->surface }} m²</p>
        <p><strong>Nombre de chambres:</strong> {{ $annonce->nombre_chambres }}</p>
        <p><strong>Nombre de salles de bain:</strong> {{ $annonce->nombre_salles_de_bain }}</p>
        <p><strong>Type:</strong> {{ $annonce->type }}</p>
        <div>
            <h3>Photos:</h3>
            @if ($annonce->photos)
            @foreach (json_decode($annonce->photos) as $photo)
            <img src="{{ asset('photos/' . $photo) }}" alt="Photo de {{ $annonce->titre }}" style="max-width: 200px;">
            @endforeach
            @else
            <p>Aucune photo disponible.</p>
            @endif
        </div>
    </div> @if(Auth::check())
    <form action="{{ route('favorites.toggle', $annonce->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">
            @if(Auth::user()->favorites->contains($annonce->id))
            Retirer des Favoris
            @else
            Ajouter aux Favoris
            @endif
        </button>
    </form>
    @endif
</body>

</html>