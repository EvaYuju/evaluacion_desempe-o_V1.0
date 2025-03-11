 
@extends('layouts.app')

@section('title', 'Detalle de Categoría')

@section('content')
    <h1>Detalle de la Categoría</h1>
    <div class="card">
        <div class="card-header">
            <h3>{{ $category->title }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Descripción:</strong> {{ $category->description }}</p>

            <h5>Preguntas asociadas:</h5>
            <ul>
                @foreach ($category->questions as $question)
                    <li>{{ $question->question }}</li>
                @endforeach
            </ul>

            <a href="{{ route('categories.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
@endsection
