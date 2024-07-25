<!-- resources/views/annonces/show.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $annonce->titre }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .annonce-details {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .annonce-title {
            color: #2a678c;
        }

        .annonce-info strong {
            color: #3f7ea3;
        }

        .annonce-info p {
            color: #343a40;
        }

        .annonce-photos img {
            max-width: 200px;
            border-radius: 5px;
            margin: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #688d4e;
            border-color: #688d4e;
        }

        .btn-primary:hover {
            background-color: #a0b348;
            border-color: #8fa73d;
        }
    </style>
</head>

<body>
    @include('partials.nav')

    <div class="container mt-5">
        <div class="annonce-details">
            <h1 class="annonce-title">{{ $annonce->titre }}</h1>
            <div class="annonce-info">
                <p><strong>Description:</strong> {{ $annonce->description }}</p>
                <p><strong>Prix:</strong> {{ $annonce->prix }} €</p>
                <p><strong>Localisation:</strong> {{ $annonce->localisation }}</p>
                <p><strong>Surface:</strong> {{ $annonce->surface }} m²</p>
                <p><strong>Nombre de chambres:</strong> {{ $annonce->nombre_chambres }}</p>
                <p><strong>Nombre de salles de bain:</strong> {{ $annonce->nombre_salles_de_bain }}</p>
                <p><strong>Type:</strong> {{ $annonce->type }}</p>
            </div>
            <div>
                <h3>Photos:</h3>
                <div class="annonce-photos">
                    @if ($annonce->photos)
                    @foreach (json_decode($annonce->photos) as $photo)
                    <a href="{{ asset('photos/' . $photo) }}" data-lightbox="annonce-photos" data-title="{{ $annonce->titre }}">
                        <img src="{{ asset('photos/' . $photo) }}" alt="Photo de {{ $annonce->titre }}">
                    </a>
                    @endforeach
                    @else
                    <p>Aucune photo disponible.</p>
                    @endif
                </div>
            </div>
            @if(Auth::check())
            <form action="{{ route('favorites.toggle', $annonce->id) }}" method="POST" class="mt-3">
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
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>

</html>