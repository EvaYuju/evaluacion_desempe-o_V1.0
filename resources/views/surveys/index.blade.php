@extends('layouts.app')

@section('title', 'Encuestas')

@section('content')
    <h1>Encuestas</h1>
    <a href="{{ route('surveys.create') }}" class="btn btn-primary">Crear Encuesta</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surveys as $survey)
                <tr>
                    <td>{{ $survey->title }}</td>
                    <td>{{ $survey->description }}</td>
                    <td>
                        <a href="{{ route('surveys.edit', $survey->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('surveys.destroy', $survey->id) }}" method="POST" style="display:inline;">
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
