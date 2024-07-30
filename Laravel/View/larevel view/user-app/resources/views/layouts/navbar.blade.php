<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Css Link  put after title  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!--Script Link  put befor end of </body> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <style>
        * {
            padding: 0;
            margin: 0;
            text-decoration: none;
        }

        .navbar {
            padding: 10px;
            background: #003049;
            color: white;
            display: flex;
            justify-content: space-between;
            position: sticky;
            top: 0;
        }

        a {
            text-decoration: none;
            color: white;
        }
        a:hover{
            color: #f1c40f;
        }

        .nav-left {
            width: 20%;
            display: flex;
            justify-content: space-between;
        }
    </style>
    <div class="navbar">
        <div class="nav-left">
            <h2> <a href="{{ route('home') }}">Logo</a></h2>
        </div>
        <div class="nav-left">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('contact') }}">Contact</a>
        </div>
    </div>
</body>

</html>