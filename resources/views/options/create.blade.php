 
@extends('layouts.app')

@section('title', 'Crear Opción')

@section('content')
    <h1>Crear Opción</h1>
    <form action="{{ route('options.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="question_id" class="form-label">Pregunta</label>
            <select class="form-control" name="question_id" required>
                @foreach($questions as $question)
                    <option value="{{ $question->id }}">{{ $question->question }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="option_text" class="form-label">Opción</label>
            <input type="text" class="form-control" name="option_text" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection
