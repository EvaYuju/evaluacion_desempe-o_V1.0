@extends('layouts.app')

@section('content')
    <h1>Editar Encuesta</h1>

    <form action="{{ route('surveys.update', $survey->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Título</label>
            <input type="text" name="title" id="title" value="{{ $survey->title }}" required>
        </div>
        <div>
            <label for="description">Descripción</label>
            <textarea name="description" id="description" required>{{ $survey->description }}</textarea>
        </div>
        <div>
            <label for="questions">Preguntas</label>
            <select name="questions[]" id="questions" multiple>
                @foreach($questions as $question)
                    <option value="{{ $question->id }}" {{ $survey->questions->contains($question->id) ? 'selected' : '' }}>
                        {{ $question->question }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="scales">Escalas</label>
            <select name="scales[]" id="scales" multiple>
                @foreach($scales as $scale)
                    <option value="{{ $scale->id }}" {{ $survey->scales && $survey->scales->contains($scale->id) ? 'selected' : '' }}>
                        {{ $scale->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Actualizar Encuesta</button>
    </form>
@endsection