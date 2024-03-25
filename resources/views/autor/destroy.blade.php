@extends('layout.app')
@section('content')
    <div>
        <form action="{{ route('autor.destroy', $registro->id) }}" method="POST"> 
            @csrf
            @method('DELETE')
            @include('autor.__form')
            <button type="submit">Deletar Registro</button>
        </form>
    </div>
@endsection