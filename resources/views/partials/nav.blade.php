<!-- resources/views/partials/nav.blade.php -->

<nav>
    <ul>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li><a href="{{ url('/contact') }}">Contact</a></li>
        <li><a href="{{ url('/about') }}">Qui sommes-nous</a></li>
        <li><a href="{{ url('/sell') }}">Vendre un bien</a></li>
        <li><a href="{{ url('/listings') }}">Liste des annonces</a></li>
        @auth
        <li><a href="{{ url('/annonces/create') }}">Ajouter une annonce</a></li>
        <li style="float:right; position:relative;">
            <span id="user-menu-toggle" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
            </span>

            <div id="user-menu" style="display:none;">
                <a href="{{ url('/settings') }}">Paramètres</a>
                <a href="{{ route('favorites.index') }}">Favoris</a> <!-- Lien ajouté pour les favoris -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Déconnexion</button>
                </form>
            </div>
        </li>
        @else
        <li><a href="{{ url('/login') }}">Connexion/Inscription</a></li>
        @endauth
    </ul>
</nav>

<script>
    document.getElementById('user-menu-toggle').addEventListener('click', function() {
        var userMenu = document.getElementById('user-menu');
        userMenu.style.display = userMenu.style.display === 'none' ? 'block' : 'none';
    });
</script>