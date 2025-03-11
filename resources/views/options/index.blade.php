 
@extends('layouts.app')

@section('title', 'Opciones')

@section('content')
    <h1>Opciones</h1>
    <a href="{{ route('options.create') }}" class="btn btn-primary">Agregar Opción</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pregunta</th>
                <th>Opción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($options as $option)
                <tr>
                    <td>{{ $option->id }}</td>
                    <td>{{ $option->question->question }}</td>
                    <td>{{ $option->option_text }}</td>
                    <td>
                        <a href="{{ route('options.edit', $option->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('options.destroy', $option->id) }}" method="POST" style="display:inline;">
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
