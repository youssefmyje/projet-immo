<!-- resources/views/emails/contact.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Email</title>
</head>

<body>
    <h1>Vous avez reçu un nouveau message d'un client</h1>
    <p><strong>Nom:</strong> {{ $details['name'] }}</p>
    <p><strong>Prénom:</strong> {{ $details['surname'] }}</p>
    <p><strong>Email:</strong> {{ $details['email'] }}</p>
    <p><strong>Message:</strong> {{ $details['message'] }}</p>
</body>

</html>