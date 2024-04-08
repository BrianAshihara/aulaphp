@extends('layout.app')
@section('content')
<div>
    <x-local-sistema mensagemPrincipal="Exclusao de Autor" mensagemSecundaria="Excluir registro de Autor" url="autor.index" navegacao="Listagem de Autores" />
    <div class="container">
    <div class= "row justify-content-center">
      <div class="col-xs-12 col-sm-12 cold-md-12 ">
    <div class="tile">
        <div class="tile-body">
            <form action="{{ route('autor.destroy', $registro->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @include('autor.__form')
                <button type="submit">Deletar Registro</button>
            </form>
        </div>
</div>
</div>
</div>
        @endsection