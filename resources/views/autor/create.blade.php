@extends('layout.app')
@section('content')
<div class="app-title">
        <div>
          <h1><i class="bi bi-speedometer"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 5 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
    <div class="tile">
        <div class="tile-title">
        <form action="{{ route('autor.store') }}" method="POST">   
            @csrf
            @include('autor.__form')
            <button type="submit">Salvar Registro</button>
        </form>
    </div>
</div>
</div>
@endsection