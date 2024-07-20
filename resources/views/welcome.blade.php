<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Agence Immobilière</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Barre de navigation -->
    @include('partials.nav')

    <!-- Section de recherche -->
    <section class="search-section container mt-5">
        <h1 class="text-center mb-4">Recherche de biens immobiliers</h1>
        <form action="{{ url('/search') }}" method="GET" class="form-row justify-content-center">
            <div class="form-group col-md-12 text-center">
                <label for="transaction" class="mr-3">Transaction:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="buy" name="transaction" value="buy">
                    <label class="form-check-label" for="buy">Acheter</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="rent" name="transaction" value="rent">
                    <label class="form-check-label" for="rent">Louer</label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="location">Localisation:</label>
                <input type="text" id="location" name="location" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="budget_min">Budget Min:</label>
                <input type="number" id="budget_min" name="budget_min" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="budget_max">Budget Max:</label>
                <input type="number" id="budget_max" name="budget_max" class="form-control">
            </div>
            <div class="form-group col-md-2 align-self-end">
                <button type="submit" class="btn btn-primary btn-block">Rechercher</button>
            </div>
        </form>
    </section>

    <!-- Affichage des annonces -->
    <section class="annonces-section container mt-5">
        <h2 class="text-center">Nos dernières annonces</h2>
        <div class="row">
            @foreach($annonces as $annonce)
            <div class="col-md-4">
                <div class="annonce card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">{{ $annonce->titre }}</h3>
                        <p class="card-text">{{ $annonce->description }}</p>
                        <a href="{{ url('/listings/' . $annonce->id) }}" class="btn btn-link">Voir les détails</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Sections supplémentaires -->
    <section class="additional-section container mt-5">
        <h2 class="text-center">Présentation de l'agence</h2>
        <p class="text-center">Bienvenue à notre agence immobilière. Nous offrons les meilleurs services pour vous aider à trouver votre maison de rêve.</p>
    </section>

    <section class="additional-section container mt-5">
        <h2 class="text-center">Nos services</h2>
        <ul class="list-unstyled text-center">
            <li>Achat de biens immobiliers</li>
            <li>Location de biens immobiliers</li>
            <li>Gestion de propriétés</li>
        </ul>
    </section>

    <section class="additional-section container mt-5 mb-5">
        <h2 class="text-center">Témoignages</h2>
        <p class="text-center">"Service excellent et très professionnel!" - Client satisfait</p>
    </section>

    <!-- Footer -->
    <footer class="text-center bg-dark text-white py-3">
        <p>Contactez-nous : contact@agence-immobiliere.fr | 01 23 45 67 89</p>
    </footer>
</body>

</html>