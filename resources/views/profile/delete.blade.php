@extends('templates.template_config_user.index')

@section('conteudo')
@if ($errors->userDeletion->any())
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
                title: '{{ $errors->userDeletion->first() }}'
            });
        });
    </script>
@endif
<h1 class="deleteTitle">Excluir Conta:</h1>
<p>
    Ao clicar em "Desejo Excluir Minha Conta" todos os seus dados vinculados a esse perfil serão apagados. Só clique se realmente tiver certeza
    da exclusão.
</p>
<form action="{{ route('profile.destroy') }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="deleteClass">
        <label class="deleteLabel" for="password" class="form-label">Confirme sua senha:</label>
        <input class="deleteInput" type="password" name="password" id="password" class="form-control" required>
    </div>
    <button type="submit" id="deleteBtn" class="deleteButton">Desejo Excluir Minha Conta</button>
</form>
@endsection

