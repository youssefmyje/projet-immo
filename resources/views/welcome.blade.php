<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Agence Immobilière</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Barre de navigation -->
    @include('partials.nav')

    <!-- Section de recherche -->
    <section>
        <h1>Recherche de biens immobiliers</h1>
        <form action="{{ url('/search') }}" method="GET">
            <input type="radio" id="buy" name="transaction" value="buy">
            <label for="buy">Acheter</label>
            <input type="radio" id="rent" name="transaction" value="rent">
            <label for="rent">Louer</label><br>
            <label for="location">Localisation:</label>
            <input type="text" id="location" name="location"><br>
            <label for="budget_min">Budget Min:</label>
            <input type="number" id="budget_min" name="budget_min"><br>
            <label for="budget_max">Budget Max:</label>
            <input type="number" id="budget_max" name="budget_max"><br>
            <button type="submit">Rechercher</button>
        </form>
    </section>

    <!-- Affichage des annonces -->
    <section>
        <h2>Nos dernières annonces</h2>
        <div class="annonces">
            @foreach($annonces as $annonce)
            <div class="annonce">
                <h3>{{ $annonce->titre }}</h3>
                <p>{{ $annonce->description }}</p>
                <a href="{{ url('/listings/' . $annonce->id) }}">Voir les détails</a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Sections supplémentaires -->
    <section>
        <h2>Présentation de l'agence</h2>
        <p>Bienvenue à notre agence immobilière. Nous offrons les meilleurs services pour vous aider à trouver votre maison de rêve.</p>
    </section>

    <section>
        <h2>Nos services</h2>
        <ul>
            <li>Achat de biens immobiliers</li>
            <li>Location de biens immobiliers</li>
            <li>Gestion de propriétés</li>
        </ul>
    </section>

    <section>
        <h2>Témoignages</h2>
        <p>"Service excellent et très professionnel!" - Client satisfait</p>
    </section>

    <!-- Footer -->
    <footer>
        <p>Contactez-nous : contact@agence-immobiliere.fr | 01 23 45 67 89</p>
    </footer>
</body>

</html>