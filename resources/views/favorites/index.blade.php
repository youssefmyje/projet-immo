<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoris</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('partials.nav')

    <h1>Mes Favoris</h1>

    @if($favorites->isEmpty())
    <p>Vous n'avez aucun favori.</p>
    @else
    <div class="row">
        @foreach($favorites as $favorite)
        <div class="col-md-4">
            <div class="annonce card mb-4">
                <div class="card-body">
                    @if($favorite->annonce->photos)
                    @foreach(json_decode($favorite->annonce->photos) as $photo)
                    <img src="{{ asset('photos/' . $photo) }}" alt="Photo de l'annonce" class="img-fluid mb-2">
                    @endforeach
                    @endif
                    <h3 class="card-title">{{ $favorite->annonce->titre }}</h3>
                    <p class="card-text">{{ $favorite->annonce->description }}</p>
                    <a href="{{ url('/listings/' . $favorite->annonce->id) }}" class="btn btn-link">Voir les détails</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</body>

</html>