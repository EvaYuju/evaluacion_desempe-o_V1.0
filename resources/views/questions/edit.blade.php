 
@extends('layouts.app')

@section('title', 'Editar Pregunta')

@section('content')
    <h1>Editar Pregunta</h1>
    <form action="{{ route('questions.update', $question->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="question" class="form-label">Pregunta</label>
            <input type="text" class="form-control" name="question" value="{{ $question->question }}" required>
        </div>
        <div class="mb-3">
            <label for="survey_id" class="form-label">Encuesta</label>
            <select name="survey_id" class="form-control" required>
                @foreach($surveys as $survey)
                    <option value="{{ $survey->id }}" @if($survey->id == $question->survey_id) selected @endif>{{ $survey->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection
