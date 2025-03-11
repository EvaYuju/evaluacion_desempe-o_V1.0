 
@extends('layouts.app')

@section('title', 'Editar Respuesta')

@section('content')
    <h1>Editar Respuesta</h1>
    <form action="{{ route('answers.update', $answer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select class="form-control" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $answer->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="question_id" class="form-label">Pregunta</label>
            <select class="form-control" name="question_id" required>
                @foreach($questions as $question)
                    <option value="{{ $question->id }}" {{ $answer->question_id == $question->id ? 'selected' : '' }}>
                        {{ $question->question }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="response" class="form-label">Respuesta</label>
            <input type="text" class="form-control" name="response" value="{{ $answer->response }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection
