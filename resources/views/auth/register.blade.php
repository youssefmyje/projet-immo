<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('partials.nav')

    <h1>Inscription</h1>

    @if (session('message'))
    <p>{{ session('message') }}</p>
    @endif

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('register.submit') }}" method="POST">
        @csrf
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="password_confirmation">Confirmer mot de passe:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required><br>

        <button type="submit">Inscription</button>
    </form>

    <p>Déjà un compte ? <a href="{{ route('login') }}">Se connecter</a></p>
</body>

</html>