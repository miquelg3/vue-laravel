<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Simon dice</title>
    <style>
        body {
        font-family: "Arial", sans-serif;
        background-image: url('https://marketplace.canva.com/EAD2962NKnQ/2/0/1600w/canva-rainbow-gradient-pink-and-purple-zoom-virtual-background-_Tcjok-d9b4.jpg'); 
        background-repeat: no-repeat; 
        background-size: cover; 
        background-attachment: fixed;
        }
    </style>
</head>
<body>
    @if (Auth::check())
        {{-- He creat este blade per a que tinga la seua pròpia ruta --}}
        <div id="app">
            <simondice>
            </simondice>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    @else
        <p>Tienes que iniciar sesión</p>
    @endif
</body>
</html>