<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une annonce</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('partials.nav')

    <h1>Ajouter une annonce</h1>

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="prix">Prix:</label>
        <input type="number" id="prix" name="prix" required><br>

        <label for="localisation">Localisation:</label>
        <input type="text" id="localisation" name="localisation" required><br>

        <label for="surface">Surface:</label>
        <input type="number" id="surface" name="surface" required><br>

        <label for="nombre_chambres">Nombre de chambres:</label>
        <input type="number" id="nombre_chambres" name="nombre_chambres" required><br>

        <label for="nombre_salles_de_bain">Nombre de salles de bain:</label>
        <input type="number" id="nombre_salles_de_bain" name="nombre_salles_de_bain" required><br>

        <label for="type">Type:</label>
        <select id="type" name="type" required>
            <option value="louer">Louer</option>
            <option value="vendre">Vendre</option>
        </select><br>

        <label for="images">Images:</label>
        <input type="file" id="images" name="images[]" multiple><br>

        <button type="submit">Ajouter</button>
    </form>
</body>

</html>