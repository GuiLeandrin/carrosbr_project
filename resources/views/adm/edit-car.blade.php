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
<div class="carEditContainer">
    <div class="carEditTitle">
        <h1><i class="fa-solid fa-pencil"></i> Editar Carro:</h1>
        <a title="Voltar" href="{{ route('painel.config.car') }}"><i class="fa-solid fa-share fa-flip-both fa-xl"></i></a>
    </div>
    <div class="carEditInfo">
        <form class="carEditForm" action="{{ route('painel.update.car', $car->id) }}" method="POST">
            @csrf
            <div class="carEditClass">
                <div class="carEditGroup">
                    <label class="carEditLabel" for="photo1_url">Foto 1 (URL):</label>
                    <input class="carEditInput" value="{{ old('photo1_url', $car->photo1_url) }}" type="url" id="photo1_url" name="photo1_url" placeholder="https://exemplo.com/foto1.jpg" required>
                </div>
                <div class="carEditGroup">
                    <label class="carEditLabel" for="photo2_url">Foto 2 (URL):</label>
                    <input class="carEditInput" value="{{ old('photo2_url', $car->photo2_url) }}" type="url" id="photo2_url" name="photo2_url" placeholder="https://exemplo.com/foto2.jpg" required>
                </div>
            </div>
            <div class="carEditClass">
                <div class="carEditGroup">
                    <label class="carEditLabel" for="photo3_url">Foto 3 (URL):</label>
                    <input class="carEditInput" value="{{ old('photo3_url', $car->photo3_url) }}" type="url" id="photo3_url" name="photo3_url" placeholder="https://exemplo.com/foto3.jpg" required>
                </div>
                <div class="carEditGroup">
                    <label class="carEditLabel" for="brand">Marca:</label>
                    <input class="carEditInput" value="{{ old('brand', $car->brand) }}" type="text" id="brand" name="brand" placeholder="Ex: Toyota, Honda, Ford..." required>
                </div>
            </div>
            <div class="carEditClass">
                <div class="carEditGroup">
                    <label class="carEditLabel" for="model">Modelo:</label>
                    <input class="carEditInput" value="{{ old('model', $car->model) }}" type="text" id="model" name="model" placeholder="Ex: Corolla, Civic, Fiesta..." required>
                </div>
                <div class="carEditGroup">
                    <label class="carEditLabel" for="color">Cor:</label>
                    <input class="carEditInput" value="{{ old('color', $car->color) }}" type="text" id="color" name="color" placeholder="Ex: Preto, Branco, Vermelho..." required>
                </div>
            </div>
            <div class="carEditClass">
                <div class="carEditGroup">
                    <label class="carEditLabel" for="year">Ano:</label>
                    <input class="carEditInput" value="{{ old('year', $car->year) }}" type="number" id="year" name="year" placeholder="Ex: 2020" min="1900" max="2099" required>
                </div>
                <div class="carEditGroup">
                    <label class="carEditLabel" for="mileage">Quilometragem (km):</label>
                    <input class="carEditInput" value="{{ old('mileage', $car->mileage) }}" type="number" id="mileage" name="mileage" placeholder="Ex: 45000" min="0" required>
                </div>
            </div>
            <div class="carEditClass">
                <div class="carEditGroup">
                    <label class="carEditLabel" for="price">Preço (R$):</label>
                    <input class="carEditInput" value="{{ old('price', $car->price) }}" type="number" step="0.01" id="price" name="price" placeholder="Ex: 85000.00" min="0" required>
                </div>
                <div class="carEditGroup">
                    <label class="carEditLabel" for="details">Detalhes:</label>
                    <textarea class="carEditInput" id="details" name="details" placeholder="Ex: Carro único dono, revisado, pneus novos..." rows="2">{{ old('details', $car->details) }}</textarea>
                </div>
            </div>
            <button class="carEditButton" type="submit">Alterar</button>
        </form>
    </div>
</div>
@endsection


