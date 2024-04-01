@extends('layout.app')
@section('content')



<div>
    <x-local-sistema mensagemPrincipal="Listagem de Autores" mensagemSecundaria="Lista de Autores Cadastrados" url="dashboard" navegacao="Pagina Principal" />
    <div class="container">

        <div class="tile">
            <div class="tile-body">
                <form action="{{route('autor.index')}}" method="POST" class="form form-inline" action="{{route('autor.index')}}" method="POST">
                    <form class="row row-cols-lg-auto g-3 align-items-center">
                        @csrf
                        <div class="col-12">
                            <label class="visually-hidden" for="pesquisar">Pesquisar</label>
                            <div class="input-group">
                                <div class="input-group-text"></div>
                                <input type="text" name="pesquisar" class="form-control" id="pesquisar" placeholder="Username">

                            </div>
                        </div>

                        <div class="col-12">
                            <label class="visually-hidden" for="selecionar">Preference</label>
                            <select class="form-select" id="selecionar" name="perPage">
                                @foreach($pages as $perPage)
                                <option value="{{$perPage}}" @if($item==$perPage) selected @endif>{{$perPage}}</option>
                                
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

            </div>
            </form>
            <table class="table table-stipped table-bordered table-hover">
                <tr class="cabecalho">
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
                <tbody>
                    @foreach($registros as $registro)
                    <tr> <!-- linha-->
                        <!-- colunas-->
                        <td>{{ $registro->nome }}</td>
                        <td>{{ $registro->email }}</td>
                        <td>{{ $registro->telefone }}</td>
                        <td style="text-align:center">
                            <!--rotina para exclusao, edicao e delecao-->
                            <a class="btn btn-secundary btn-sm" href="{{ route('autor.edit', $registro->id) }}">Alteração</a>
                            <a class="btn btn-danger btn-sm" href="{{ route('autor.delete', $registro->id) }}">Exclusão</a>
                            <a class="btn btn-info btn-sm" href="{{ route('autor.show', $registro->id) }}">Consulta</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a type="button" class="btn btn-primary" href="{{ route('autor.create')}}">Incluir novo Autor</a>
        </div>
    </div>
</div>
</div>
@endsection