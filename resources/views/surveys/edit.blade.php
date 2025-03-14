 
@extends('layouts.app')

@section('title', 'Editar Encuesta')

@section('content')
    <h1>Editar Encuesta</h1>
    <form action="{{ route('surveys.update', $survey->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="title" value="{{ $survey->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" name="description">{{ $survey->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection
