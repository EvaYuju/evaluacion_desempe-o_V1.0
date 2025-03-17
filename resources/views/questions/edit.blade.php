@extends('layouts.app')

@section('title', 'Editar Pregunta')

@section('content')
    <h1>Editar Pregunta</h1>
    <form action="{{ route('questions.update', $question->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="question" class="form-label">Pregunta</label>
            <input type="text" class="form-control" name="question" value="{{ old('question', $question->question) }}" required>
        </div>
        <div class="mb-3">
            <label for="survey_id" class="form-label">Encuesta</label>
            <select name="survey_id" class="form-control" required>
                @foreach($surveys as $survey)
                    <option value="{{ $survey->id }}" @if($survey->id == $question->survey_id) selected @endif>{{ $survey->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $question->category_id) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="scale_id" class="form-label">Escala</label>
            <select name="scale_id" class="form-control" required>
                @foreach($scales as $scale)
                    <option value="{{ $scale->id }}" @if($scale->id == $question->scale_id) selected @endif>{{ $scale->title }} ({{ $scale->value }})</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection
