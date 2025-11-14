@extends('templates.template_config_user.index')

@section('conteudo')
    @if (session('status'))
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
                title: '{{ session('status') }}'
            });
        });
    </script>
    @endif
    @if ($errors->updatePassword->any())
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    showCloseButton: true,
                    timer: 4000,
                    timerProgressBar: true,
                    background: '#ffe6e6',
                    color: '#7f1d1d',
                    iconColor: '#dc2626',
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer
                        toast.onmouseleave = Swal.resumeTimer
                    }
                });

                Toast.fire({
                    icon: 'error',
                    title: '{{ $errors->updatePassword->first() }}'
                });
            });
        </script>
    @endif
    <h1 class="editTitle">Alteração de Perfil:</h1>
    <div class="editMenu">
        <h4>|</h4>
        <a href="{{ route('profile.edit') }}">Alterar Dados</a>
        <h4>|</h4>
        <a href="{{ route('password.edit') }}">Alterar Senha</a>
        <h4>|</h4>
    </div>
    <div class="editInfo">
        <form class="editForm" method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')
            <div class="editClass">
                <label class="editLabel" for="current_password">Senha atual:</label>
                <input class="editInput" type="password" id="current_password" name="current_password" required autofocus>
            </div>
            <div class="editClass">
                <label class="editLabel" for="password">Nova senha:</label>
                <input class="editInput" type="password" id="password" name="password" required>
            </div>
            <div class="editClass">
                <label class="editLabel" for="password_confirmation">Confirmar: </label>
                <input class="editInput" type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button class="editButton" type="submit">Alterar senha</button>
        </form>
    </div>
@endsection
