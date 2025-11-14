@extends('templates.template_painel_adm.index')

@section('conteudo')
@if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000,
                timerProgressBar: true,
                background: '#dcfce7',
                color: '#166534',
                iconColor: '#16a34a',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer
                    toast.onmouseleave = Swal.resumeTimer
                }
            });

            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
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
<div class="carContainer">
    <table class="carTable">
        <thead class="carTHead">
            <tr class="carTr">
                <th class="carTh">ID:</th>
                <th class="carTh">1º Imagem:</th>
                <th class="carTh">2º Imagem:</th>
                <th class="carTh">3º Imagem:</th>
                <th class="carTh">Marca:</th>
                <th class="carTh">Modelo:</th>
                <th class="carTh">Cor:</th>
                <th class="carTh">Ano:</th>
                <th class="carTh">Quilometragem:</th>
                <th class="carTh">Preço:</th>
                <th class="carTh">Detalhes:</th>
                <th class="carTh">Configurações:</th>
            </tr>
        </thead>
        <tbody class="carTBody">
            @foreach ($cars as $cars)
            <tr class="carTrInfo">
                <td class="carTd">{{ $cars->id }}</td>
                <td class="carTd">
                    <img src="{{ $cars->photo1_url }}" alt="Foto 1" width="100">
                </td>
                <td class="carTd">
                    <img src="{{ $cars->photo2_url }}" alt="Foto 2" width="100">
                </td>
                <td class="carTd">
                    <img src="{{ $cars->photo3_url }}" alt="Foto 3" width="100">
                </td>
                <td class="carTd">{{ $cars->brand }}</td>
                <td class="carTd">{{ $cars->model }}</td>
                <td class="carTd">{{ $cars->color }}</td>
                <td class="carTd">{{ $cars->year }}</td>
                <td class="carTd">{{ number_format($cars->mileage, 0, ',', '.') }} km</td>
                <td class="carTd">R$ {{ number_format($cars->price, 2, ',', '.') }}</td>
                <td class="carTd">{{ $cars->details }}</td>
                <td class="carTdConfig">
                    <a title="Excluir Carro" class="carButtonDel btn-delete" href="{{ route('painel.destroyCar', $cars->id) }}"><i class="fa-solid fa-trash"></i></a>
                    <a title="Editar Carro" class="carButtonEdit" href="{{ route('painel.edit.car', $cars->id) }}"><i class="fa-solid fa-pencil"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="carButtonAdd" href="{{ route('painel.add.car') }}"><i class="fa-solid fa-plus"></i> Novo Carro</a>
</div>
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