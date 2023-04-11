@extends('welcome')

@section('content')
    <div class="container2 text-center text-danger">
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
                    </div>
                </div> 
                <div class="card-footer text-muted">
                    <p><strong>Fecha publicación:</strong> {{ $event->date }}</p>
                </div>
                <div>
                    <h3>Asistentes del Evento</h3>
                </div>
            </div>  
            <a href="{{ route('events') }}" class="btn m-3 rosita"><i class="fa fa-reply"></i> Volver </a>
        </div>
    </div>
@endsection
