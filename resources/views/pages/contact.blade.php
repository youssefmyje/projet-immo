<!-- resources/views/pages/contact.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('partials.nav')

    <h1>Contactez-nous</h1>

    @if (session('message'))
    <p>{{ session('message') }}</p>
    @endif

    <form action="{{ route('send.contact') }}" method="POST">
        @csrf
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="surname">Prénom:</label>
        <input type="text" id="surname" name="surname" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea><br>

        <button type="submit">Envoyer</button>
    </form>
</body>

</html>