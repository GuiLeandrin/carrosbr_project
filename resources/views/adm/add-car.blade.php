@extends('templates.template_painel_adm.index')

@section('conteudo')
@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const errorMessages = @json($errors->all());

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 5000,
                timerProgressBar: true,
                background: '#fee2e2',
                color: '#b91c1c',
                iconColor: '#dc2626',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer
                    toast.onmouseleave = Swal.resumeTimer
                }
            });

            errorMessages.forEach(msg => {
                Toast.fire({
                    icon: 'error',
                    title: msg
                });
            });
        });
    </script>
@endif
<div class="carAddContainer">
    <div class="carAddTitle">
        <h1><i class="fa-solid fa-plus"></i> Adicionar Carro:</h1>
        <a title="Voltar" href="{{ route('painel.config.car') }}"><i class="fa-solid fa-share fa-flip-both fa-xl"></i></a>
    </div>
    <div class="carAddInfo">
        <form class="carAddForm" action="{{ route('painel.store.car') }}" method="POST">
            @csrf
            <div class="carAddClass">
                <div class="carAddGroup">
                    <label class="carAddLabel" for="photo1_url">Foto 1 (URL):</label>
                    <input class="carAddInput" value="{{ old('photo1_url') }}" type="url" id="photo1_url" name="photo1_url" placeholder="https://exemplo.com/foto1.jpg" required>
                </div>
                <div class="carAddGroup">
                    <label class="carAddLabel" for="photo2_url">Foto 2 (URL):</label>
                    <input class="carAddInput" value="{{ old('photo2_url') }}" type="url" id="photo2_url" name="photo2_url" placeholder="https://exemplo.com/foto2.jpg" required>
                </div>
            </div>
            <div class="carAddClass">
                <div class="carAddGroup">
                    <label class="carAddLabel" for="photo3_url">Foto 3 (URL):</label>
                    <input class="carAddInput" value="{{ old('photo3_url') }}" type="url" id="photo3_url" name="photo3_url" placeholder="https://exemplo.com/foto3.jpg" required>
                </div>
                <div class="carAddGroup">
                    <label class="carAddLabel" for="brand">Marca:</label>
                    <input class="carAddInput" value="{{ old('brand') }}" type="text" id="brand" name="brand" placeholder="Ex: Toyota, Honda, Ford..." required>
                </div>
            </div>
            <div class="carAddClass">
                <div class="carAddGroup">
                    <label class="carAddLabel" for="model">Modelo:</label>
                    <input class="carAddInput" value="{{ old('model') }}" type="text" id="model" name="model" placeholder="Ex: Corolla, Civic, Fiesta..." required>
                </div>
                <div class="carAddGroup">
                    <label class="carAddLabel" for="color">Cor:</label>
                    <input class="carAddInput" value="{{ old('color') }}" type="text" id="color" name="color" placeholder="Ex: Preto, Branco, Vermelho..." required>
                </div>
            </div>
            <div class="carAddClass">
                <div class="carAddGroup">
                    <label class="carAddLabel" for="year">Ano:</label>
                    <input class="carAddInput" value="{{ old('year') }}" type="number" id="year" name="year" placeholder="Ex: 2020" min="1900" max="2099" required>
                </div>
                <div class="carAddGroup">
                    <label class="carAddLabel" for="mileage">Quilometragem (km):</label>
                    <input class="carAddInput" value="{{ old('mileage') }}" type="number" id="mileage" name="mileage" placeholder="Ex: 45000" min="0" required>
                </div>
            </div>
            <div class="carAddClass">
                <div class="carAddGroup">
                    <label class="carAddLabel" for="price">Preço (R$):</label>
                    <input class="carAddInput" value="{{ old('price') }}" type="number" step="0.01" id="price" name="price" placeholder="Ex: 85000.00" min="0" required>
                </div>
                <div class="carAddGroup">
                    <label class="carAddLabel" for="details">Detalhes:</label>
                    <textarea class="carAddInput" id="details" name="details" placeholder="Ex: Carro único dono, revisado, pneus novos..." rows="2">{{ old('details') }}</textarea>
                </div>
            </div>
            <button class="carAddButton" type="submit">Cadastrar</button>
        </form>
    </div>
</div>
@endsection


