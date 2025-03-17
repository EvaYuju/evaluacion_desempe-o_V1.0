@extends('layouts.app')

@section('title', 'Crear Pregunta')

@section('content')
    <h1>Crear Pregunta</h1>
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="question" class="form-label">Pregunta</label>
            <input type="text" class="form-control" name="question" required>
        </div>
        <div class="mb-3">
            <label for="survey_id" class="form-label">Encuesta</label>
            <select class="form-control" name="survey_id" required>
                @foreach($surveys as $survey)
                    <option value="{{ $survey->id }}">{{ $survey->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select class="form-control" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="scale_id" class="form-label">Escala</label>
            <select class="form-control" name="scale_id" required>
                @foreach($scales as $scale)
                    <option value="{{ $scale->id }}">{{ $scale->title }} ({{ $scale->value }})</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection
