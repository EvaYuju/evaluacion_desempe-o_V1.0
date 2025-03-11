 
@extends('layouts.app')

@section('title', 'Detalle de Encuesta')

@section('content')
    <h1>Detalle de la Encuesta</h1>
    <div class="card">
        <div class="card-header">
            <h3>{{ $survey->title }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Descripción:</strong> {{ $survey->description }}</p>
            <p><strong>Fecha de creación:</strong> {{ $survey->created_at->format('d/m/Y') }}</p>
            <p><strong>Fecha de actualización:</strong> {{ $survey->updated_at->format('d/m/Y') }}</p>

            <a href="{{ route('surveys.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
@endsection
