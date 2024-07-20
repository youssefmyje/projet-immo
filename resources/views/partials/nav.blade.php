<!-- resources/views/partials/nav.blade.php -->

<nav>
    <ul>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li><a href="{{ url('/login') }}">Connexion/Inscription</a></li>
        <li><a href="{{ url('/contact') }}">Contact</a></li>
        <li><a href="{{ url('/about') }}">Qui sommes-nous</a></li>
        <li><a href="{{ url('/sell') }}">Vendre un bien</a></li>
        <li><a href="{{ url('/listings') }}">Liste des annonces</a></li>
        @auth
        <li style="float:right;">👤 {{ Auth::user()->name }}</li>
        @endauth
    </ul>
</nav>