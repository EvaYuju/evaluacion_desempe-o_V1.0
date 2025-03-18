@extends('layouts.app')

@section('title', 'Preguntas')

@section('content')
    <h1>Preguntas</h1>
    <a href="{{ route('questions.create') }}" class="btn btn-primary">Crear Pregunta</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Pregunta</th>
                <th>Encuesta</th>
                <th>Categoría</th>
                <th>Escala</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->survey->title }}</td>
                    <td>{{ $question->category->title }}</td>
                    <td>{{ $question->scale->title }} ({{ $question->scale->value }})</td>
                    <td>
                        <a href="{{ route('questions.show', $question->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
