<!-- resources/views/pages/login.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #E6EEF6;
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
            color: #2E5E76;
        }

        .form-header h2 {
            margin: 0;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #2E5E76;
        }

        .form-control {
            width: 100%;
            padding: 5px;
            font-size: 16px;
            border: 1px solid #4F789A;
            border-radius: 5px;
        }

        .form-control:focus {
            border-color: #2E5E76;
            box-shadow: 0 0 5px rgba(46, 94, 118, 0.5);
        }

        .form-submit {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            color: #fff;
            background-color: #6D8D44;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-submit:hover {
            background-color: #A6B729;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            color: #2E5E76;
        }

        .form-footer a {
            color: #4F789A;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
            <li><a href="{{ url('/about') }}">Qui sommes-nous</a></li>
            <li><a href="{{ url('/sell') }}">Vendre un bien</a></li>
            <li><a href="{{ url('/listings') }}">Liste des annonces</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h2>Connexion</h2>
            </div>
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="form-submit">Connexion</button>
            </form>
            <div class="form-footer">
                <p>Pas encore de compte ? <a href="{{ route('register') }}">Inscrivez-vous</a></p>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>