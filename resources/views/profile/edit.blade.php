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
    @if ($errors->any())
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
                    title: '{{ $errors->first() }}'
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
        <form class="editForm" action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="editClass">
                <label class="editLabel" for="name">Nome:</label>
                <input class="editInput" type="text" id="name" name="name" value="{{ auth()->user()->name }}"  required @if(strtolower($user->name) === 'admin') disabled @endif>
            </div>
            <div class="editClass">
                <label class="editLabel" for="email">E-mail:</label>
                <input class="editInput" type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
            </div>
            <button class="editButton" type="submit">Salvar alterações</button>
        </form>
    </div>
@endsection
