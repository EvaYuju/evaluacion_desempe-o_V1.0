 
@extends('layouts.app')

@section('title', 'Detalle de Escala')

@section('content')
    <h1>Detalle de la Escala</h1>
    <div class="card">
        <div class="card-header">
            <h3>{{ $scale->title }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Valor:</strong> {{ $scale->value }}</p>
            <p><strong>Puntos:</strong> {{ $scale->points }}</p>

            <h5>Preguntas asociadas:</h5>
            <ul>
                @foreach ($scale->questions as $question)
                    <li>{{ $question->question }}</li>
                @endforeach
            </ul>

            <a href="{{ route('scales.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
@endsection
