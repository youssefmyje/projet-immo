<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qui sommes-nous</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    @include('partials.nav')

    <div class="container">
        <h1 class="section-title">Qui sommes-nous</h1>

        <section class="section-content">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Notre Histoire</h2>
                    <p>Nous sommes une agence immobilière spécialisée dans la vente et la location de biens immobiliers. Depuis notre création en 2000, nous avons aidé des milliers de clients à trouver leur maison de rêve.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/history.jpg') }}" class="img-fluid rounded" alt="Notre Histoire">
                </div>
            </div>
        </section>

        <section class="section-content">
            <div class="row align-items-center">
                <div class="col-md-6 order-md-2">
                    <h2>Notre Mission</h2>
                    <p>Notre mission est de fournir un service de qualité supérieure à nos clients en les aidant à naviguer dans le processus complexe de l'achat, de la vente ou de la location d'un bien immobilier.</p>
                </div>
                <div class="col-md-6 order-md-1">
                    <img src="{{ asset('images/mission.jpg') }}" class="img-fluid rounded" alt="Notre Mission">
                </div>
            </div>
        </section>

        <section class="section-content">
            <h2>Notre Équipe</h2>
            <div class="row text-center">
                <div class="col-md-4 team-member">
                    <img src="{{ asset('images/team1.jpg') }}" alt="Membre de l'équipe 1" class="img-fluid rounded-circle">
                    <h3>Jean Dupont</h3>
                    <p>Directeur Général</p>
                </div>
                <div class="col-md-4 team-member">
                    <img src="{{ asset('images/team2.jpg') }}" alt="Membre de l'équipe 2" class="img-fluid rounded-circle">
                    <h3>Marie Dubois</h3>
                    <p>Responsable des Ventes</p>
                </div>
                <div class="col-md-4 team-member">
                    <img src="{{ asset('images/team3.jpg') }}" alt="Membre de l'équipe 3" class="img-fluid rounded-circle">
                    <h3>Paul Martin</h3>
                    <p>Agent Immobilier</p>
                </div>
            </div>
        </section>
    </div>

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>