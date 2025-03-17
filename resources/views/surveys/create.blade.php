@extends('layouts.app')

@section('title', 'Crear Encuesta')

@section('content')
    <h1>Crear Encuesta</h1>
    <form action="{{ route('surveys.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" name="description"></textarea>
        </div>

        <!-- Selección de categorías -->
        <div class="mb-3">
            <label for="category" class="form-label">Categoría</label>
            <select class="form-control" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <!-- Selección de escalas -->
        <div class="mb-3">
            <label for="scale" class="form-label">Escala</label>
            <select class="form-control" name="scale_id" required>
                @foreach($scales as $scale)
                    <option value="{{ $scale->id }}">{{ $scale->title }} ({{ $scale->value }})</option>
                @endforeach
            </select>
        </div>

        <!-- Asignación de usuarios -->
        <div class="mb-3">
            <label for="users" class="form-label">Asignar Empleados</label>
            <select class="form-control" name="user_ids[]" multiple required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection
