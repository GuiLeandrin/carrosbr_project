@extends('templates.template_home.index')

@section('conteudo')
<div class="mainDetails">
    <div class="containerDetails">
        <div class="cardDetails">
            <div class="card__title">
                <a href="{{ route('home') }}"><div class="icon"><i class="fa fa-arrow-left"></i></div></a>
                <h3>Novos Carros</h3>
            </div>
            <div class="card__body">
                <div class="half">
                    <div class="featured_text">
                        <h2>{{ $cars->brand }}</h2>
                        <p class="sub">{{ $cars->model }}</p>
                        <p class="price">R${{ number_format($cars->price, 0, ',', '.') }}</p>
                    </div>
                    <div class="image">
                        <img id="product-image" src="{{ $cars->photo1_url }}" alt="">
                    </div>
                </div>
                <div class="half">
                    <div class="description2">
                        <h3>Configurações:</h3>
                        <p>{{ $cars->color }}</p>
                        <p>|</p>
                        <p>{{ number_format($cars->mileage, 0, ',', '.') }}km</p>
                        <p>|</p>
                        <p>{{ $cars->year }}</p>
                    </div>
                    <div class="description">
                        <p>{{ $cars->details }}</p>
                    </div>
                    <div class="change-image">
                        <i title="Próxima Imagem" id="next-image" class="fa fa-arrow-right"></i>
                    </div>
                </div>
            </div>
            <div class="card__footer">
                <div class="recommend">
                    <p>Recomendado por</p>
                    <h3>CarrosBR</h3>
                </div>
                <div class="action">
                    <a href="https://wa.me/5514988257660?text=Olá,%20tenho%20interesse%20no%20veículo!" target="_blank">
                        <i class="fa-brands fa-whatsapp"></i> Entrar em Contato com o Vendedor
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
    let currentImageIndex = 0;
    const images = [
        "{{ $cars->photo1_url }}",
        "{{ $cars->photo2_url }}",
        "{{ $cars->photo3_url }}"
    ];

    const productImage = document.getElementById('product-image');
    const nextImageButton = document.getElementById('next-image');

    nextImageButton.addEventListener('click', () => {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        productImage.src = images[currentImageIndex];
    });
    </script>
@endsection