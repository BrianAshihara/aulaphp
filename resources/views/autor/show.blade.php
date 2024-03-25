@extends('layout.app')
@section('content')
    <div>
        <form>
            @csrf
            @include('autor.__form')
            <a href="{{ route('autor.index') }}">Cancelar</a>
        </form>
    </div>
@endsection