@extends('layout.app')
@section('content')

<div>
  <x-local-sistema mensagemPrincipal="Inclusão de Autor" mensagemSecundaria="Cadastrar novo registro de Autor" url="autor.index" navegacao="Listagem de Autores" />
  <div class="tile">
    <div class="tile-body">
      <form action="{{ route('autor.store') }}" method="POST">
        @csrf
        @include('autor.__form')
        <button type="submit" class="btn btn-primary">Salvar Registro</button>
      </form>
    </div>
  </div>
</div>
@endsection