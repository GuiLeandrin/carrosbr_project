@extends('templates.template_config_user.index')

@section('conteudo')
        <h1 class="showTitle">Informações do seu Perfil:</h1>
        <div class="showInfo">
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Criado em:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
        </div>
@endsection
