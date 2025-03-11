 
@extends('layouts.app')

@section('title', 'Detalles de Opción')

@section('content')
    <h1>Detalles de la Opción</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $option->id }}</p>
            <p><strong>Pregunta:</strong> {{ $option->question->question }}</p>
            <p><strong>Opción:</strong> {{ $option->option_text }}</p>
            <p><strong>Respuesta:</strong> {{ $option->answer->answer_text }}</p>
        </div>
    </div>

    <a href="{{ route('options.index') }}" class="btn btn-primary mt-3">Volver a la lista</a>
@endsection
