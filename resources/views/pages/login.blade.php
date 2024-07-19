<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion/Inscription</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('partials.nav')
    <h1>Connexion/Inscription</h1>
    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <label for="email">Email :</label>
        <input type="email" id="email" name="email"><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password"><br>
        <button type="submit">Connexion</button>
    </form>
</body>

</html>