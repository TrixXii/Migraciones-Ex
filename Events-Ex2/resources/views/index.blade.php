@extends('welcome')

@section('content')

    <div class="container">
        <h1 class="m-3 ">Lista de Eventos</h1>

        <div id="contenido" class="row row-cols-md-3 g-3 m-auto">
            @foreach ($events as $event)
                <div class="col">
                    <div class="card h-100 text-bg-light"  >
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text contentEvent">{{ substr($event->description, 0, 150) }}...</p>

                            <small id="creador" class="card card-footer">
                                <span><b>Evento creado por: </b> {{ $event->user->name }}</span>
                            </small>
                        </div>
                        <div class="cad card-footer ">
                            <p class="card-text textoEvent"><b>Fecha: </b>{{ date('Y-m-d', strtotime($event->date)) }}</p>
                            <div class="d-flex">
                                <a href="{{ route('editar', $event->id) }}" class="btn btn-warning m-1">Editar</a>
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
