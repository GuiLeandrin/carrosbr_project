@extends('templates.template_autenticacao.index')

@section('conteudo')
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
@if (session('sucesso'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                title: '{{ session('sucesso') }}'
            });
        });
    </script>
@endif
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
@if (session('logout'))
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
                background: '#fff7cc',
                color: '#7c5e00', 
                iconColor: '#d97706',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer
                    toast.onmouseleave = Swal.resumeTimer
                }
            });

            Toast.fire({
                icon: 'warning',
                title: '{{ session('logout') }}'
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
<form method="POST" action="{{ route('login') }}">
    @csrf
    <h1>Login</h1>
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
            <input type="password" name="password" placeholder="Senha" required />
    <a href="{{ route('password.request') }}" id="link">Esqueceu sua Senha?</a>
    <button>Entrar</button>
    <p>Ainda não possui conta? <a href="{{ route('registrar') }}">Entre Aqui</a></p>

</form>
@endsection

