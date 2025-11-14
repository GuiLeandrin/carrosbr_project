<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarrosBR</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4/animate.min.css"/>
    <link rel="stylesheet" href="/adm/css/style.css">
    <script src="https://kit.fontawesome.com/bf7c5a1aa6.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="topBar">
        <div class="title">
            <h1><i class="fa-solid fa-car fa-xs"></i> <a class="aTitle" href="{{ route('painel.adm') }}">Painel ADM</a></h1>
            <h1>|</h1>
            <a title="Gerenciamento de Usuários" class="aMenu" href="{{ route('painel.user.list') }}"><h2>Usuários</h2></a>
            <h1>|</h1>
            <a title="Gerenciamento de Carros" class="aMenu" href="{{ route('painel.config.car') }}"><h2>Carros</h2></a>
            <h1>|</h1>
        </div>
        <div class="buttons">
            <a title="Voltar" href="{{ route('home') }}"><i class="fa-solid fa-share fa-flip-both fa-xl"></i></a>
        </div>
    </div>
    <div class="container">
        @yield('conteudo')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>