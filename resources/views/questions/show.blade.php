@extends('layouts.app')

@section('title', 'Detalle de Pregunta')

@section('content')
    <h1>Detalle de la Pregunta</h1>
    <div class="card">
        <div class="card-header">
            <h3>{{ $question->question }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Encuesta:</strong> {{ $question->survey->title }}</p>
            <p><strong>Categoría:</strong> {{ $question->category->title }}</p>
            <p><strong>Escala:</strong> {{ $question->scale->title }} ({{ $question->scale->value }})</p>
            <p><strong>Fecha de creación:</strong> {{ $question->created_at->format('d/m/Y') }}</p>
            <p><strong>Fecha de actualización:</strong> {{ $question->updated_at->format('d/m/Y') }}</p>

            <a href="{{ route('questions.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
@endsection
