 
@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
    <h1>Categorías</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Crear Categoría</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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
