@extends('layout.app')
@section('content')

<div>
    <x-local-sistema mensagemPrincipal="Alterar Autor" mensagemSecundaria="Alterar Registro" url="autor.index" navegacao="Listagem de Autores" />
    <div class="container">
    @include('layout.alert')
    <div class= "row justify-content-center">
      <div class="col-xs-12 col-sm-12 cold-md-12 ">
    <div class="tile">
        <div class="tile-body">
        <form action="{{ route('autor.update', $registro->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('autor.__form')
            <button class="btn btn-primary" type="submit">Salvar Registro</button>
        </form>
    </div>
</div>
</div>
</div>
</div>
@endsection