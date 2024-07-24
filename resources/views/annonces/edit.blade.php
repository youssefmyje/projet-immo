<!-- resources/views/annonces/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer Annonce</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('partials.nav')

    <h1>Editer Annonce</h1>

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('annonces.update', $annonce->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" value="{{ $annonce->titre }}" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ $annonce->description }}</textarea><br>

        <label for="prix">Prix:</label>
        <input type="number" id="prix" name="prix" value="{{ $annonce->prix }}" required><br>

        <label for="localisation">Localisation:</label>
        <input type="text" id="localisation" name="localisation" value="{{ $annonce->localisation }}" required><br>

        <label for="surface">Surface:</label>
        <input type="number" id="surface" name="surface" value="{{ $annonce->surface }}" required><br>

        <label for="nombre_chambres">Nombre de chambres:</label>
        <input type="number" id="nombre_chambres" name="nombre_chambres" value="{{ $annonce->nombre_chambres }}" required><br>

        <label for="nombre_salles_de_bain">Nombre de salles de bain:</label>
        <input type="number" id="nombre_salles_de_bain" name="nombre_salles_de_bain" value="{{ $annonce->nombre_salles_de_bain }}" required><br>

        <label for="type">Type:</label>
        <select id="type" name="type" required>
            <option value="louer" {{ $annonce->type == 'louer' ? 'selected' : '' }}>Louer</option>
            <option value="vendre" {{ $annonce->type == 'vendre' ? 'selected' : '' }}>Vendre</option>
        </select><br>

        <label for="photos">Images:</label>
        <input type="file" id="photos" name="photos[]" multiple><br>

        <button type="submit">Mettre à jour</button>
    </form>
</body>

</html>