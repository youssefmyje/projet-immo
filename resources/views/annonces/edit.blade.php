<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer Annonce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            background-color: #E6EEF6;
            /* Couleur de fond générale */
        }

        .container {
            margin-top: 50px;
        }

        .form-container {
            background-color: #E6EEF6;
            /* Couleur de fond du formulaire */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-header h1 {
            font-size: 24px;
            color: #2E5E76;
            font-weight: bold;
            /* Appliquer le gras */
        }

        .form-group label {
            font-weight: bold;
            color: #2E5E76;
        }

        .form-control,
        .form-control-file {
            border-radius: 5px;
            border: 1px solid #4F789A;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #2E5E76;
            box-shadow: 0 0 5px rgba(46, 94, 118, 0.5);
        }

        .btn-primary {
            background-color: #6D8D44;
            border-color: #6D8D44;
            font-size: 18px;
            padding: 10px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #A6B729;
            border-color: #A6B729;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            border-radius: 5px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    @include('partials.nav')

    <div class="container">
        <div class="form-header">
            <h1>Editer Annonce</h1>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('annonces.update', $annonce->id) }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titre">Titre:</label>
                <input type="text" id="titre" name="titre" class="form-control" value="{{ $annonce->titre }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="5" required>{{ $annonce->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="prix">Prix:</label>
                <input type="number" id="prix" name="prix" class="form-control" value="{{ $annonce->prix }}" required>
            </div>

            <div class="form-group">
                <label for="localisation">Localisation:</label>
                <input type="text" id="localisation" name="localisation" class="form-control" value="{{ $annonce->localisation }}" required>
            </div>

            <div class="form-group">
                <label for="surface">Surface:</label>
                <input type="number" id="surface" name="surface" class="form-control" value="{{ $annonce->surface }}" required>
            </div>

            <div class="form-group">
                <label for="nombre_chambres">Nombre de chambres:</label>
                <input type="number" id="nombre_chambres" name="nombre_chambres" class="form-control" value="{{ $annonce->nombre_chambres }}" required>
            </div>

            <div class="form-group">
                <label for="nombre_salles_de_bain">Nombre de salles de bain:</label>
                <input type="number" id="nombre_salles_de_bain" name="nombre_salles_de_bain" class="form-control" value="{{ $annonce->nombre_salles_de_bain }}" required>
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="louer" {{ $annonce->type == 'louer' ? 'selected' : '' }}>Louer</option>
                    <option value="vendre" {{ $annonce->type == 'vendre' ? 'selected' : '' }}>Vendre</option>
                </select>
            </div>

            <div class="form-group">
                <label for="photos">Images:</label>
                <input type="file" id="photos" name="photos[]" class="form-control-file" multiple>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Mettre à jour</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>