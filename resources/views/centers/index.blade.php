@extends('layouts.app')
@section('title', 'Lista de Centros')
@section('content')
    <h1>Lista de Centros</h1>
    <a href="{{ route('centers.create') }}" class="btn btn-primary">Crear Nuevo Centro</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Denominación</th>
                <th>Provincia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($centers as $center)
                <tr>
                    <td>{{ $center->id }}</td>
                    <td>{{ $center->denomination }}</td>
                    <td>{{ $center->province }}</td>
                    <td>
                        <a href="{{ route('centers.show', $center) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('centers.edit', $center) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('centers.destroy', $center) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este centro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection