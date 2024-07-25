<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .admin-dashboard {
            margin-top: 50px;
        }

        .admin-dashboard h1 {
            color: #2a678c;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
            font-weight: bold;
        }

        .admin-dashboard h2 {
            color: #3f7ea3;
            margin-top: 30px;
            font-size: 2rem;
            font-weight: bold;
            border-bottom: 2px solid #688d4e;
            padding-bottom: 10px;
        }

        .table-container {
            overflow-x: auto;
            margin-top: 20px;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid #2a678c;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            table-layout: fixed;
        }

        .table thead th {
            background-color: #688d4e;
            color: white;
            padding: 10px;
            border-bottom: 2px solid #2a678c;
            white-space: nowrap;
            text-align: center;
        }

        .table-hover tbody tr:hover {
            background-color: #e7f0f7;
        }

        .table tbody td {
            padding: 10px;
            border-bottom: 1px solid #2a678c;
            white-space: nowrap;
            text-align: center;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table td:nth-child(1),
        .table th:nth-child(1) {
            width: 8%;
        }

        .table td:nth-child(2),
        .table th:nth-child(2) {
            width: 18%;
        }

        .table td:nth-child(3),
        .table th:nth-child(3) {
            width: 32%;
        }

        .table td:nth-child(4),
        .table th:nth-child(4) {
            width: 10%;
        }

        .table td:nth-child(5),
        .table th:nth-child(5) {
            width: 12%;
        }

        .table td:nth-child(6),
        .table th:nth-child(6) {
            width: 20%;
        }

        .btn {
            font-size: 0.75rem;
            font-weight: bold;
            padding: 5px 8px;
            border-radius: 5px;
            transition: all 0.2s ease-in-out;
        }

        .btn-primary {
            background-color: #2a678c;
            border-color: #2a678c;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #3f7ea3;
            border-color: #3f7ea3;
            color: #fff;
        }

        .btn-danger {
            background-color: #e3342f;
            border-color: #e3342f;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #cc1f1a;
            border-color: #cc1f1a;
            color: #fff;
        }

        .btn-warning {
            background-color: #ffed4a;
            border-color: #ffed4a;
            color: #343a40;
        }

        .btn-warning:hover {
            background-color: #ffe12b;
            border-color: #ffe12b;
            color: #343a40;
        }
    </style>
</head>

<body>
    @include('partials.nav')

    <div class="container admin-dashboard">
        <h1>Admin Dashboard</h1>

        <section>
            <h2>Annonces</h2>
            <div class="table-container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Localisation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($annonces as $annonce)
                        <tr>
                            <td>{{ $annonce->id }}</td>
                            <td>{{ $annonce->titre }}</td>
                            <td>{{ $annonce->description }}</td>
                            <td>{{ $annonce->prix }}</td>
                            <td>{{ $annonce->localisation }}</td>
                            <td>
                                <a href="{{ route('annonces.edit', $annonce->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('annonces.destroy', $annonce->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <section>
            <h2>Utilisateurs</h2>
            <div class="table-container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Admin</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_admin ? 'Oui' : 'Non' }}</td>
                            <td>
                                <form action="{{ route('users.toggleAdmin', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">{{ $user->is_admin ? 'Retirer admin' : 'Rendre admin' }}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>

</html>