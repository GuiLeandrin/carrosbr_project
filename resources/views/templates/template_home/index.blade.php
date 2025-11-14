<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarrosBR</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4/animate.min.css"/>
    <link rel="stylesheet" href="/menu/css/style.css">
    <script src="https://kit.fontawesome.com/bf7c5a1aa6.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    showCloseButton: true,
                    closeButtonHtml: '&times;',
                    timer: 4000,
                    timerProgressBar: true,
                    background: '#e6ffee',
                    color: '#065f46',
                    iconColor: '#16a34a',
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer
                        toast.onmouseleave = Swal.resumeTimer
                    }
                });

                Toast.fire({
                    icon: 'success',
                    title: '{{ session('success') }}'
                });
            });
        </script>
    @endif
    <div class="topBar">
        <div class="title">
            <h1><i class="fa-solid fa-car fa-xs"></i> Carros<span>BR</span></h1>
        </div>
        <div class="buttons">
            @if (Auth::user()->name === 'admin')
                <a href="{{ route('painel.adm') }}" title="Painel Administrativo"><i class="fa-solid fa-file-shield fa-xl"></i></a>
            @endif
            <a title="Configurações do Usuário" href="{{ route('profile.show') }}"><i class="fa-solid fa-user-gear fa-xl"></i></a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i title="Logout" class="fa-solid fa-right-from-bracket fa-xl"></i>
                </button>
            </form>
        </div>
    </div>
    @yield('conteudo')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>