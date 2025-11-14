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
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            Toast.fire({
                icon: 'error',
                title: texto
            });

            setTimeout(() => window.scrollTo(0, 0), 100);
        });
    </script>
@endif
<form method="POST" action="{{ route('password.store') }}">
    @csrf
    <h1>Redefinir Senha</h1>

    <input type="hidden" name="token" value="{{ request('token') }}">
    <input type="email" name="email" placeholder="Email" value="{{ request('email') }}" required>
    <input type="password" name="password" placeholder="Nova senha" required autofocus>
    <input type="password" name="password_confirmation" placeholder="Confirmar senha" required>

    <button>Redefinir Senha</button>
    <a href="{{ route('logar') }}" id="linkr">Voltar ao Login</a>
</form>
@endsection
