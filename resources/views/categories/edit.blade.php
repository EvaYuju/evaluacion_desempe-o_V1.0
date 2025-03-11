 
@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
    <h1>Editar Categoría</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="title" value="{{ $category->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" name="description" rows="4" required>{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection
