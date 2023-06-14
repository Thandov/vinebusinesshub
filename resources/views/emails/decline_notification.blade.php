<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industry Declined</title>
</head>

<body>
    <p>Dear Business,</p>

    <p>We regret to inform you that your requested industry has been declined. Please review the inserted industry.</p>

    <p>The declined industry is: {{ $industry->industry }}</p>

    <p>Thank you for your request.</p>

    <p>Best regards,</p>
    <p>The VineSA</p>

    <p><a href="{{ $url }}">Click here</a> to visit our website.</p>
</body>

</html>
