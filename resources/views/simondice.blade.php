<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    {{-- He creat este blade per a que tinga la seua pròpia ruta --}}
    <div id="app">
        <simondice>
        </simondice>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>