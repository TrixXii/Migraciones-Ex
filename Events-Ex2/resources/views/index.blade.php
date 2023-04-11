@extends('welcome')

@section('content')

    <div class="container ">
        <h1 class="mt-3">Lista de Eventos</h1>
        <hr>
        <a class="m-3 btn btn-success" href="{{ route('create') }}">Crear  <i class="fa fa-plus"></i></a>
        <div id="contenido" class="row row-cols-md-3 g-3 m-auto">
         @foreach ($events as $event)
         <div class="col">
            <div class="card h-100 text-bg-light"  >
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text textoEvent">{{ $event->description}}</p>
                    
                    <small id="creador" class="card card-footer">
                        <span><b>Evento creado por: </b> {{ $event->user->name }}</span>
                    </small>
                </div>
                <div class="cad card-footer ">
                    <p class="card-text textoEvent"><b>Fecha: </b>{{ $event->date}}</p>
                    <div class="d-flex  ">
                    <a href="#" class="btn btn-warning m-1">Edita</a>
                    <a href="{{ route('show', $event->id) }}" class="btn btn-info m-1">Visualizar</a>
                    <form method="POST" action="{{ route('destroy', ['id' => $event->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger m-1">Eliminar</button>
                    </form>
                </div>
                </div>
            </div>  
         </div>       
        @endforeach
        </div>
    </div>

@endsection
