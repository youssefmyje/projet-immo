<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    @include('partials.nav')

    <div class="settings-container">
        <h1>Paramètres</h1>

        @if (session('success'))
        <div class="success-message">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        @if ($errors->any())
        <div class="error-list">
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
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>

            <label for="password">Nouveau mot de passe (laisser vide pour conserver le mot de passe actuel):</label>
            <input type="password" id="password" name="password">

            <label for="password_confirmation">Confirmer le nouveau mot de passe:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">

            <label for="address">Adresse:</label>
            <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}">

            <label for="birthdate">Date de naissance:</label>
            <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}">

            <button type="submit">Mettre à jour</button>
        </form>
    </div>
</body>

</html>