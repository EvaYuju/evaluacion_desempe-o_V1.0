 
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
            <select name="survey_id" class="form-control" required>
                @foreach($surveys as $survey)
                    <option value="{{ $survey->id }}">{{ $survey->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection
