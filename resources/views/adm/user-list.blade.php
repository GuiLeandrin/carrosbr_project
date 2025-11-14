@extends('templates.template_painel_adm.index')

@section('conteudo')
@if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                showCloseButton: true,
                closeButtonHtml: '&times;',
                timer: 4000,
                timerProgressBar: true,
                background: '#e6ffee',
                color: '#065f46',
                icon: 'success',
                iconColor: '#16a34a',
                title: '{{ session('success') }}'
            });
        });
    </script>
@endif
@if (session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                showCloseButton: true,
                closeButtonHtml: '&times;',
                timer: 4000,
                timerProgressBar: true,
                background: '#fee2e2',
                color: '#b91c1c',
                icon: 'error',
                iconColor: '#dc2626',
                title: '{{ session('error') }}'
            });
        });
    </script>
@endif
<table class="usersTable">
    <thead class="usersTHead">
        <tr class="usersTr">
            <th class="usersTh">ID:</th>
            <th class="usersTh">Nome:</th>
            <th class="usersTh">Email:</th>
            <th class="usersTh">Data de Criação:</th>
            <th class="usersTh">Configurações:</th>
        </tr>
    </thead>
    <tbody class="usersTBody">
        @foreach ($users as $user)
        <tr class="usersTrInfo">
            <td class="usersTd">{{ $user->id }}</td>
            <td class="usersTd">{{ $user->name }}</td>
            <td class="usersTd">{{ $user->email }}</td>
            <td class="usersTd">{{ $user->created_at->format('d/m/Y') }}</td>
            <td class="usersTdDel">
                <a title="Excluir Usuário" class="usersButton btn-delete" href="{{ route('painel.destroyUser', $user->id) }}"><i class="fa-solid fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const userName = this.dataset.name;
            const href = this.getAttribute('href');

            Swal.fire({
                title: `Realmente deseja excluir esse usuário?`,
                text: "Essa ação não poderá ser desfeita!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#88a3bdff',
                confirmButtonText: 'Sim, Excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            });
        });
    });
});
</script>
@endsection
