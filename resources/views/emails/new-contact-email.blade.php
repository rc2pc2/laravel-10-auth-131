<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravello Mailer</title>
</head>
<body>
    <h1>
        Ciaone Admin!
    </h1>
    <p>
        Hai ricevuto un nuovo contatto dalla tua applicazione LARAVELLO PROFESH
    </p>
    <p>
        Nome: {{ $lead->name }}
    </p>
    <p>
        Email:  {{ $lead->email }}
    </p>
    <p>
        Messaggio:  {{ $lead->message }}
    </p>

</body>
</html>
