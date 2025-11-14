@extends('templates.template_home.index')

@section('conteudo')
<div class="container">
    @foreach($cars as $car)
        <div class="card">
            <div class="tilt">
                <div class="img"><img src="{{ $car->photo1_url }}"></div>
            </div>
            <div class="info">
                <h2 class="titleCard">{{ $car->brand }} {{ $car->model }}</h2>
                <p class="desc">{{ $car->details }}</p>
                <div class="feats">
                    <span class="feat">{{ $car->color }}</span>
                    <span class="feat">{{ $car->year }}</span>
                    <span class="feat">{{ number_format($car->mileage, 0, ',', '.') }}km</span>
                </div>
                <div class="bottom">
                    <div class="priceCard">
                        <span class="new">R${{ number_format($car->price, 0, ',', '.') }}</span>
                    </div>
                    <a class="btnCard" href="{{ route('car.details', $car->id) }}">Ver Detalhes</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection