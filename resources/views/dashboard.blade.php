<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="user-name" content="{{ Auth::user()->name }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Prova</title>
</head>
<body class="bg-image" style="background-image: url('https://marketplace.canva.com/EAD2962NKnQ/2/0/1600w/canva-rainbow-gradient-pink-and-purple-zoom-virtual-background-_Tcjok-d9b4.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed">
    {{-- Pàgina personal per a cada usuari --}}
    <div class=" container relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div id="titulo" class="container">
            <h1>Symbaloo</h1>
        </div>
        <div id="descripcion" class="container">
            <h3>Usuario: {{ Auth::user()->name }}</h3>
        </div>
        {{-- Axina trauia els posts sense vue --}}
        {{-- <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                {{-- Bucle per a trobar els posts de l usuari --}}
                {{-- Comandament per a poder traure l'id de l'últim App\Models\Post::latest()->first()->id; --}}
                {{-- @php $num = App\Models\Post::count(); @endphp
                @for ($i = 1; $i <= $num; $i++)
                    @if (App\Models\Post::find($i)->propietari == Auth::user()->name)
                    <div class="col" style="display: inline">
                        <a  href="{{App\Models\Post::find($i)->linkweb}}" title="Nombre: {{App\Models\Post::find($i)->nom}}" style="text-decoration: none">
                            <span class="bi bi-square" style="background-image: url({{App\Models\Post::find($i)->linkimage}}); background-align: center; background-repeat: no-repeat; font-size:80px; background-size: 78px 70px; background-position-y: 21px; background-position-x: 1px"></span>
                        </a>
                        <br>
                    </div>
                    @endif
                    @endfor
            </div>
        </div> --}}
        <br>
        {{-- Ací no és només el botó, sinó també les els posts --}}
            <div id="app">
                <boto :user_auth="'{{Auth::user()->name}}'">
                </boto>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>