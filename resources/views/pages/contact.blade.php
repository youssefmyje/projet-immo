<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .contact-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #E6EEF6;
        }

        .contact-header {
            text-align: center;
            margin-bottom: 20px;
            color: #2E5E76;
        }

        .contact-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .contact-form-group {
            margin-bottom: 15px;
        }

        .contact-form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #2E5E76;
        }

        .contact-form-control {
            width: 100%;
            padding: 5px;
            font-size: 16px;
            border: 1px solid #4F789A;
            border-radius: 5px;
        }

        .contact-form-control:focus {
            border-color: #2E5E76;
            box-shadow: 0 0 5px rgba(46, 94, 118, 0.5);
        }

        .contact-form-submit {
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

        .contact-form-submit:hover {
            background-color: #A6B729;
        }

        .success-message {
            background-color: #6d8d44;
            /* Utilisation de la couleur vert clair de la palette */
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    @include('partials.nav')

    <div class="container">
        <div class="contact-header">
            <h1>Contactez-nous</h1>
        </div>
        <div class="contact-container">
            @if (session('message'))
            <div class="success-message">
                {{ session('message') }}
            </div>
            @endif
            <form action="{{ route('send.contact') }}" method="POST">
                @csrf
                <div class="contact-form-group">
                    <label for="name" class="contact-form-label">Nom:</label>
                    <input type="text" id="name" name="name" class="contact-form-control" required>
                </div>
                <div class="contact-form-group">
                    <label for="surname" class="contact-form-label">Prénom:</label>
                    <input type="text" id="surname" name="surname" class="contact-form-control" required>
                </div>
                <div class="contact-form-group">
                    <label for="email" class="contact-form-label">Email:</label>
                    <input type="email" id="email" name="email" class="contact-form-control" required>
                </div>
                <div class="contact-form-group">
                    <label for="message" class="contact-form-label">Message:</label>
                    <textarea id="message" name="message" class="contact-form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="contact-form-submit">Envoyer</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>