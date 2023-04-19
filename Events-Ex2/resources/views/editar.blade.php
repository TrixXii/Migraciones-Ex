@extends('welcome')

@section('content')
    <div class="container">
        <h1 class="text-center">Editar Evento</h1>
        <hr>
        <form method="POST" class="w-75 m-auto" action="{{ route('update', $editEvent->id) }}" >
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $editEvent->title }}">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ date('Y-m-d', strtotime($editEvent->date)) }}">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion">{{ $editEvent->description }}</textarea>
            </div>
            <div class=" col form-group">
                <label for="location">Localizacion del evento</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $editEvent->location }}">
            </div>
        <a href="{{ route('events') }}" class="btn m-3 rosita"><i class="fa fa-reply"></i> Cancelar </a>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
