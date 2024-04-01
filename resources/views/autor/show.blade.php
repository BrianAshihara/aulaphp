@extends('layout.app')
@section('content')
<div>
    <x-local-sistema mensagemPrincipal="Mostrar Autores" mensagemSecundaria="Mostrar registro de Autor" url="autor.index" navegacao="Listagem de Autores" />
    <div class="tile">
        <div class="tile-body">
            <form>
                @csrf
                @include('autor.__form')
                <a href="{{ route('autor.index') }}">Cancelar</a>
            </form>
        </div>
        @endsection