 
@extends('layouts.app')

@section('title', 'Detalle de Respuesta')

@section('content')
    <h1>Detalle de la Respuesta</h1>
    <div class="card">
        <div class="card-header">
            <h3>Respuesta: {{ $answer->response }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Usuario:</strong> {{ $answer->user->name }}</p>
            <p><strong>Pregunta:</strong> {{ $answer->question->question }}</p>
            <p><strong>Fecha de creación:</strong> {{ $answer->created_at->format('d/m/Y') }}</p>
            <p><strong>Fecha de actualización:</strong> {{ $answer->updated_at->format('d/m/Y') }}</p>

            <a href="{{ route('answers.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
@endsection
