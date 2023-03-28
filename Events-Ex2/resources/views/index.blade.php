@extends('welcome')

@section('content')

    <div class="container">
        <h1 class="mt-3">Lista de Eventos</h1>
        <hr>
        <a class="m-3 btn btn-success" href="#">Crear  <i class="fa fa-plus"></i></a>
        <div id="contenido" class="row row-cols-md-3 g-3 m-auto">
        </div>
    </div>

@endsection
