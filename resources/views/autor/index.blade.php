@extends('layout.app')
@section('content')



<div>
    <x-local-sistema mensagemPrincipal="Listagem de Autores" mensagemSecundaria="Lista de Autores Cadastrados" url="dashboard" navegacao="Pagina Principal" />
    <div class="container">
        @include('layout.alert')
    <div class= "row justify-content-center">
      <div class="col-xs-12 col-sm-12 cold-md-12 ">

        <div class="tile">
            <div class="tile-body">
                <form action="{{route('autor.index')}}" method="POST" class="form form-inline" action="{{route('autor.index')}}" method="POST">
                    <form class="row g-3 align-items-center">
                        @csrf
                        <div class="col-7">
                        
                            <div class="input-group">
                                <div class="input-group-text"></div>
                                <input type="text" name="pesquisar" class="form-control" id="pesquisar" placeholder="Pesquisa" value="{{isset($filter['pesquisar']) ? isset($filter['pesquisar']) : ''}}">

                            </div>
                        </div>

                        <div class="col-2">
                            <select class="form-select" id="selecionar" name="perPage">
                               
                                <option value="{{$perPage}}" @if($perPage==5) selected @endif>5</option>
                                <option value="{{$perPage}}" @if($perPage==10) selected @endif>10</option>
                                <option value="{{$perPage}}" @if($perPage==15) selected @endif>15</option>
                                <option value="{{$perPage}}" @if($perPage==20) selected @endif>20</option>
                                
                            </select>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

            </div>
            </form>
            <br>
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
            <div class ="pagination justify-content-end">
                @if (isset($filter))
                {{!! $registros->appends([
                    'filter'=>$filter,
                    'perPage'=>$perPage]
                )->links() !!}}
                @else
                
                 {{$registros->appends(['perPage'=>$perPage])->links()}}
                @endif
            </div>
            <a type="button" class="btn btn-primary" href="{{ route('autor.create')}}">Incluir novo Autor</a>
        </div>
    </div>
</div>
</div>
                </div>
                </div>
                </div>
@endsection