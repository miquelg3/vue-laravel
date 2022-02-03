<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Prova</title>
</head>
<body class="bg-image" style="background-image: url('https://marketplace.canva.com/EAD2962NKnQ/2/0/1600w/canva-rainbow-gradient-pink-and-purple-zoom-virtual-background-_Tcjok-d9b4.jpg'); background-size: cover; background-repeat: no-repeat; height: 150px">
    <div class=" container relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div id="titulo" class="container">
            <h1>Symbaloo</h1>
        </div>
        <div id="descripcion" class="container">
            <h3>Usuario: {{ Auth::user()->name }}</h3>
        </div>
        {{-- Bucle per a trobar els posts de l usuari --}}
        @php $num = App\Models\Post::count(); @endphp
        @for ($i = 1; $i <= $num; $i++)
            {{-- {{ $propietari = App\Models\Post::find($i)->propietari }} --}}
            @php $i @endphp
            @if (App\Models\Post::find($i)->propietari == Auth::user()->name)
                <div id="posts" class="container">
                    <p>Post: {{  App\Models\Post::find($i)->nom }}</p>
                </div>
            @endif
        @endfor
        <div id="app">
            <div class="container">
                <inicio></inicio>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
