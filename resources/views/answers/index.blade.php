 
@extends('layouts.app')

@section('title', 'Respuestas')

@section('content')
    <h1>Respuestas</h1>
    <a href="{{ route('answers.create') }}" class="btn btn-primary">Agregar Respuesta</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Pregunta</th>
                <th>Respuesta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($answers as $answer)
                <tr>
                    <td>{{ $answer->id }}</td>
                    <td>{{ $answer->user->name }}</td>
                    <td>{{ $answer->question->question }}</td>
                    <td>{{ $answer->response }}</td>
                    <td>
                        <a href="{{ route('answers.edit', $answer->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('answers.destroy', $answer->id) }}" method="POST" style="display:inline;">
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
