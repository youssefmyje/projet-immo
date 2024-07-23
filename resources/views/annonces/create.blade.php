<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une annonce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('partials.nav')

    <div class="container mt-5">
        <h1 class="text-center mb-4">Ajouter une annonce</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            <div class="form-group">
                <label for="titre">Titre:</label>
                <input type="text" id="titre" name="titre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="prix">Prix:</label>
                <input type="number" id="prix" name="prix" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="localisation">Localisation:</label>
                <input type="text" id="localisation" name="localisation" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="surface">Surface:</label>
                <input type="number" id="surface" name="surface" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nombre_chambres">Nombre de chambres:</label>
                <input type="number" id="nombre_chambres" name="nombre_chambres" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nombre_salles_de_bain">Nombre de salles de bain:</label>
                <input type="number" id="nombre_salles_de_bain" name="nombre_salles_de_bain" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="louer">Louer</option>
                    <option value="vendre">Vendre</option>
                </select>
            </div>

            <div class="form-group">
                <label for="photos">Images:</label>
                <input type="file" id="images" name="photos[]" class="form-control-file" multiple>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>