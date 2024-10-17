<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title></title>
    <style>
        .card {
            border-radius: 5%;
            background-color: lightgreen;
        }

        .card-content {
            padding: 30px;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            z-index: -5;

        }

        .button {
            background-color: deepskyblue;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-content">
        <div class="inner">
        <h3 class="text-2xl">We received a request to reset your password.</h3>
        <p>Use the link below to set up a new password for your account. <br>
            If you did not request to reset your password, ignore this <br>
            email and the link will expire on its own.</p>
        <a href="http://localhost:5173/password_reset/{{$token}}"><button class="button">SET NEW PASSWORD HERE</button></a>
        </div>
    </div>
</div>
</body>
</html>
