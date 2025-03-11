 
@extends('layouts.app')

@section('title', 'Crear Respuesta')

@section('content')
    <h1>Crear Respuesta</h1>
    <form action="{{ route('answers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select class="form-control" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="question_id" class="form-label">Pregunta</label>
            <select class="form-control" name="question_id" required>
                @foreach($questions as $question)
                    <option value="{{ $question->id }}">{{ $question->question }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="response" class="form-label">Respuesta</label>
            <input type="text" class="form-control" name="response" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection
