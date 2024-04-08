@extends('layout.app')
@section('content')
<div>
    <x-local-sistema mensagemPrincipal="Mostrar Autores" mensagemSecundaria="Mostrar registro de Autor" url="autor.index" navegacao="Listagem de Autores" />
    <div class="container">
    @include('layout.alert')
    <div class= "row justify-content-center">
      <div class="col-xs-12 col-sm-12 cold-md-12 ">
    <div class="tile">
        <div class="tile-body">
            <form>
                @csrf
                @include('autor.__form')
                <a href="{{ route('autor.index') }}">Cancelar</a>
            </form>
        </div>
</div>
</div>
</div>
        @endsection