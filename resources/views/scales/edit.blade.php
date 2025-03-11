 
@extends('layouts.app')

@section('title', 'Editar Escala')

@section('content')
    <h1>Editar Escala</h1>
    <form action="{{ route('scales.update', $scale->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="title" value="{{ $scale->title }}" required>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Valor</label>
            <input type="number" class="form-control" name="value" value="{{ $scale->value }}" required>
        </div>
        <div class="mb-3">
            <label for="points" class="form-label">Puntos</label>
            <input type="number" class="form-control" name="points" value="{{ $scale->points }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection
