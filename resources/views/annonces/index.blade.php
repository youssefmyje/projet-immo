<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des annonces</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .annonces-container {
            padding: 50px 0;
        }

        .annonce-card {
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            background-color: var(--accent-color);
            overflow: hidden;
        }

        .annonce-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .annonce-card:hover {
            transform: translateY(-10px);
        }

        .annonce-card h3 {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .annonce-card p {
            color: var(--secondary-color);
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .annonce-card a {
            color: #fff;
            background-color: var(--light-green-color);
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .annonce-card a:hover {
            background-color: var(--green-color);
        }

        .annonce-card .card-body {
            padding: 20px;
        }

        h1 {
            color: var(--primary-color);
            margin-bottom: 40px;
            font-size: 2.5rem;
        }
    </style>
</head>

<body>
    @include('partials.nav')

    <div class="container annonces-container">
        <h1 class="text-center mb-5">Liste des annonces</h1>

        <div class="row">
            @foreach($annonces as $annonce)
            <div class="col-md-4">
                <div class="card annonce-card">
                    @if($annonce->photos)
                    @php
                    $photos = json_decode($annonce->photos);
                    @endphp
                    @if(is_array($photos) && count($photos) > 0)
                    <div id="carousel-{{$annonce->id}}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($photos as $index => $photo)
                            <div class="carousel-item @if($index == 0) active @endif">
                                <img src="{{ asset('photos/' . $photo) }}" class="d-block w-100" alt="Image de l'annonce">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-{{$annonce->id}}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-{{$annonce->id}}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    @endif
                    @else
                    <img src="{{ asset('photos/default.jpg') }}" alt="Image de l'annonce">
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">{{ $annonce->titre }}</h3>
                        <p class="card-text">{{ $annonce->description }}</p>
                        <a href="{{ url('/listings/' . $annonce->id) }}" class="btn btn-primary">Voir les détails</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>