<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoris</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .favorites-section {
            margin-top: 50px;
        }

        .favorites-title {
            color: #2a678c;
            text-align: center;
            margin-bottom: 30px;
        }

        .annonce.card {
            background-color: #e7f0f7;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .annonce.card:hover {
            transform: scale(1.05);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            color: #2a678c;
        }

        .card-text {
            color: #3f7ea3;
        }

        .btn-success {
            background-color: #688d4e;
            border-color: #688d4e;
        }

        .btn-success:hover {
            background-color: #a0b348;
            border-color: #8fa73d;
        }

        .annonce img {
            max-width: 100%;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    @include('partials.nav')

    <div class="container favorites-section">
        <h1 class="favorites-title">Mes Favoris</h1>

        @if($favorites->isEmpty())
        <p class="text-center">Vous n'avez aucun favori.</p>
        @else
        <div class="row">
            @foreach($favorites as $favorite)
            <div class="col-md-4">
                <div class="annonce card mb-4 shadow-sm border-0 rounded">
                    @if($favorite->annonce->photos)
                    <img src="{{ asset('photos/' . json_decode($favorite->annonce->photos)[0]) }}" alt="Photo de {{ $favorite->annonce->titre }}" class="img-fluid">
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">{{ $favorite->annonce->titre }}</h3>
                        <p class="card-text">{{ $favorite->annonce->description }}</p>
                        <a href="{{ url('/listings/' . $favorite->annonce->id) }}" class="btn btn-success btn-block">Voir les détails</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>