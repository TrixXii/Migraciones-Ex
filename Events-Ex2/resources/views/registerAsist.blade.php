@extends('welcome')

@section('content')
    <div class="container">
        <h1 class="text-center">Registrar Asistente</h1>
        <hr>
        <form method="POST" class="w-75 m-auto" action="{{ route('storeAttendee', $asiste->id) }}">
            @csrf
            <div class="form-group">
                <label for="user">Selecciona un usuario:</label>
                <select class="form-control" id="user" name="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="{{ route('show', $asiste->id) }}" class="btn btn-info m-1">Volver</a>


        </form>
    </div>
@endsection
