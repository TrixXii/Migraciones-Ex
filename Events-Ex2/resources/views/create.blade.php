@extends('welcome')

@section('content')
    <div class="container">
        <h1 class="text-center">Nuevo libro</h1>
        <hr>
        <form method="POST" class="w-75 m-auto" action="{{ route('store') }}" >
            @csrf
            <div class="row g-3">
                <div class="col form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class=" col form-group">
                <label for="user_id">Creador del evento</label>
                <select class="form-control" name="user_id" id="user_id">
                    @foreach($usersPar as $creador)
                        <option value="{{ $creador->id }}">{{ $creador->name }}</option>
                    @endforeach
                </select>
                
            </div>
            </div>
            <div class=" col form-group">
                <label for="date">Fecha publicacion</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class=" col form-group">
                <label for="location">Localizacion del evento</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="col form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control text-secondary" id="description" name="description"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. A sint possimus totam vel at temporibus eveniet laudantium quasi? </textarea>
            </div>
            
            
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('events') }}" class="btn btn-danger" >Cancelar</a>

        </form>
    </div>
@endsection