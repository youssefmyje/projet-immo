<!-- resources/views/settings/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('partials.nav')

    <h1>Paramètres</h1>

    @if (session('success'))
    <p>{{ session('success') }}</p>
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

    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required><br>

        <label for="password">Nouveau mot de passe (laisser vide pour conserver le mot de passe actuel):</label>
        <input type="password" id="password" name="password"><br>

        <label for="password_confirmation">Confirmer le nouveau mot de passe:</label>
        <input type="password" id="password_confirmation" name="password_confirmation"><br>

        <label for="address">Adresse:</label>
        <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}"><br>

        <label for="birthdate">Date de naissance:</label>
        <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}"><br>

        <button type="submit">Mettre à jour</button>
    </form>
</body>

</html>