@extends('templates.template_autenticacao.index')

@section('conteudo')
@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let mensagens = @json($errors->all());
            let texto = mensagens.join('<br>');

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                showCloseButton: true,
                closeButtonHtml: '&times;',
                timer: 4000,
                timerProgressBar: true,
                background: '#fee2e2',
                color: '#b91c1c', 
                iconColor: '#dc2626',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer
                    toast.onmouseleave = Swal.resumeTimer
                }
            });

            Toast.fire({
                icon: 'error',
                title: texto
            });
        });
    </script>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf
    <h1>Crie sua Conta</h1>
            <input type="text" name="name" placeholder="Nome Completo" value="{{ old('name') }}" required autofocus />
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
            <input type="password" name="password" placeholder="Senha" required />
            <input type="password" name="password_confirmation" placeholder="Confirmar Senha" required />
    <button>Cadastrar</button>
    <a href="{{ route('logar') }}" id="linkr">Voltar ao Login</a>
</form>
@endsection