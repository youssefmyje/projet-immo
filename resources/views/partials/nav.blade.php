<!-- resources/views/partials/nav.blade.php -->

<nav>
    <ul>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li><a href="{{ url('/contact') }}">Contact</a></li>
        <li><a href="{{ url('/about') }}">Qui sommes-nous</a></li>
        <li><a href="{{ url('/sell') }}">Vendre un bien</a></li>
        <li><a href="{{ url('/listings') }}">Liste des annonces</a></li>
        @auth
        <li style="float:right; position:relative;">
            <span id="user-menu-toggle" style="cursor: pointer;">👤 {{ Auth::user()->name }}</span>
            <div id="user-menu" style="display:none; position:absolute; right:0; background:white; border:1px solid #ccc; padding:10px;">
                <a href="{{ url('/settings') }}" style="display:block;">Settings</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: blue; cursor: pointer;">Déconnexion</button>
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