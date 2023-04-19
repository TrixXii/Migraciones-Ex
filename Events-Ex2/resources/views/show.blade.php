@extends('welcome')

@section('content')
    <div class="container2 text-center ">
        <div class="card text-start"> 
            <div class="row g-0">   
                <div class="card-header">
                    <h5 class="card-title">{{ $event->title }}</h5>
                </div>
                <div class="col-md-8">
                    <div class="card-body ">
                        <div class="info">
                            <p><strong>Descripción:</strong> {{ $event->description }}</p>
                        </div>
                        <h3>Asistentes del Evento</h3>
                        @foreach ($event->attendees as $attendee)
                        <div class=" w-25 position-relative">
                        {{ $attendee->name }}   
                        
                        </div>
                        @endforeach
                    
                    </div>
                </div> 
                <a href="{{ route('registerAsist', $event->id) }}" class="btn btn-secondary m-1">Añadir Asistente</a>
                
                <div class="card-footer text-muted">
                    <p><strong>Fecha publicación:</strong> {{ date('Y-m-d', strtotime($event->date)) }}</p>
                    <span><b>Evento creado por: </b> {{ $event->user->name }}</span>

                </div>

            </div>  
        </div>
        <a href="{{ route('events') }}" class="btn m-3 rosita"><i class="fa fa-reply"></i> Volver </a>

    </div>
@endsection
