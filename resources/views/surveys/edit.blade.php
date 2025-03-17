@extends('layouts.app')

@section('title', 'Editar Encuesta')

@section('content')
    <h1>Editar Encuesta</h1>
    <form action="{{ route('surveys.update', $survey->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $survey->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" name="description">{{ old('description', $survey->description) }}</textarea>
        </div>

        <!-- Selección de categorías -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select class="form-control" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $survey->category_id) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <!-- Selección de escalas -->
        <div class="mb-3">
            <label for="scale_id" class="form-label">Escala</label>
            <select class="form-control" name="scale_id" required>
                @foreach($scales as $scale)
                    <option value="{{ $scale->id }}" @if($scale->id == $survey->scale_id) selected @endif>{{ $scale->title }} ({{ $scale->value }})</option>
                @endforeach
            </select>
        </div>

        <!-- Asignación de usuarios -->
        <div class="mb-3">
            <label for="users" class="form-label">Asignar Empleados</label>
            <select class="form-control" name="user_ids[]" multiple required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if(in_array($user->id, $survey->users->pluck('id')->toArray())) selected @endif>{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection
