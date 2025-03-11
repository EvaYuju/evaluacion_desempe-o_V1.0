 
@extends('layouts.app')

@section('title', 'Editar Opción')

@section('content')
    <h1>Editar Opción</h1>
    <form action="{{ route('options.update', $option->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="question_id" class="form-label">Pregunta</label>
            <select class="form-control" name="question_id" required>
                @foreach($questions as $question)
                    <option value="{{ $question->id }}" {{ $option->question_id == $question->id ? 'selected' : '' }}>
                        {{ $question->question }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="option_text" class="form-label">Opción</label>
            <input type="text" class="form-control" name="option_text" value="{{ $option->option_text }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection
