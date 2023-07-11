<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        /* Responsive Styles */
        @media only screen and (max-width: 600px) {
            .container {
                width: 100% !important;
                padding-left: 20px !important;
                padding-right: 20px !important;
            }
        }

        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333333;
            background-color: #cfd2d5;
        }

        .header-container {
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }

        .content-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777777;
        }
    </style>
    <title>Industry Declined</title>
</head>

<body>

    <div class="container">
        <div class="header-container">
            <h1>The Vine SA</h1>
        </div>

        <div class="content-container">
            <p>Dear Business,</p>

            <p>We regret to inform you that your requested industry has been declined. Please review the inserted
                industry.</p>

            <p>The declined industry is: {{ $industry->industry }}</p>

            <p>Thank you for your request.</p>

            <p>Best regards,</p>
            <p>The VineSA</p>

            <p><a href="{{ $url }}">Click here</a> to visit our website.</p>
        </div>

        <div class="footer">
            &copy; 2023 The Vine SA. All rights reserved.
        </div>
</body>


</html>
