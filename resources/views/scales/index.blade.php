 
@extends('layouts.app')

@section('title', 'Escalas')

@section('content')
    <h1>Escalas</h1>
    <a href="{{ route('scales.create') }}" class="btn btn-primary">Crear Escala</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Título</th>
                <th>Valor</th>
                <th>Puntos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($scales as $scale)
                <tr>
                    <td>{{ $scale->title }}</td>
                    <td>{{ $scale->value }}</td>
                    <td>{{ $scale->points }}</td>
                    <td>
                        <a href="{{ route('scales.edit', $scale->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('scales.destroy', $scale->id) }}" method="POST" style="display:inline;">
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
