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
        });
    </script>
@endif
@if (session('status'))
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
                title: '{{ session('status') }}'
            });
        });
    </script>
@endif
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <h1>Validação de Email</h1>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required />
    <button>Enviar Link</button>
    <a href="{{ route('logar') }}" id="linkr">Voltar ao Login</a>
</form>
@endsection
