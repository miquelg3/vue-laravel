<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Prova</title>
</head>
<body class="antialiased bg-image" style="background-image: url('https://marketplace.canva.com/EAD2962NKnQ/2/0/1600w/canva-rainbow-gradient-pink-and-purple-zoom-virtual-background-_Tcjok-d9b4.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed">
    <div class="container relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div id="titulo" class="container">
            <h1>Symbaloo</h1>
        </div>
        <div id="descripcion" class="container">
            <h3>Esta página sirve para poder guardar links de páginas WEB de una forma vistosa y dinámica.</h3>
            <br>
            <p>Inicia sesión o regístrate para poder usarla</p>
            <br>
            <p>Ejemplo:</p>
        </div>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                <div class="col" style="display: inline">
                    <a  href="https://www.Google.com" style="text-decoration: none">
                        <span class="bi bi-square" style="background-image: url(https://storage.googleapis.com/support-kms-prod/ZAl1gIwyUsvfwxoW9ns47iJFioHXODBbIkrK); background-align: center; background-repeat: no-repeat; font-size:80px; background-size: 78px 70px; background-position-y: 21px; background-position-x: 1px"></span>
                    </a>
                    </h1 style="font-size: 80px"> Nombre: Google</h1>
                    <br>
                </div>
                <div class="col" style="display: inline">
                    <a  href="https://www.twitter.com" style="text-decoration: none">
                        <span class="bi bi-square" style="background-image: url(https://help.twitter.com/content/dam/help-twitter/brand/logo.png); background-align: center; background-repeat: no-repeat; font-size:80px; background-size: 78px 70px; background-position-y: 21px; background-position-x: 1px"></span>
                    </a>
                    </h1 style="font-size: 80px"> Nombre: Twitter</h1>
                    <br>
                </div>
            </div>
        </div>
        @if (Route::has('login'))
        <div class="navbar navbar-expand navbar-light flex-column flex-md-row bd-navbar">
            @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-dark btn-outline-secondary text-white">Entrar</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-dark btn-outline-secondary text-white">Log in</a>
            
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-dark btn-outline-secondary text-white">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>
</body>
</html>