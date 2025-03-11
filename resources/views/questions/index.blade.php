@extends('layouts.app')

@section('title', 'Preguntas')

@section('content')
    <h1>Preguntas</h1>
    <a href="{{ route('questions.create') }}" class="btn btn-primary">Agregar Pregunta</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Pregunta</th>
                <th>Encuesta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->survey->title }}</td>
                    <td>
                        <!-- Enlace para ver los detalles de la pregunta -->
                        <a href="{{ route('questions.show', $question->id) }}" class="btn btn-info">Ver Detalle</a>
                        
                        <!-- Botones de edición y eliminación -->
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
