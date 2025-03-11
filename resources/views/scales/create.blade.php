 
@extends('layouts.app')

@section('title', 'Crear Escala')

@section('content')
    <h1>Crear Escala</h1>
    <form action="{{ route('scales.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Valor</label>
            <input type="number" class="form-control" name="value" required>
        </div>
        <div class="mb-3">
            <label for="points" class="form-label">Puntos</label>
            <input type="number" class="form-control" name="points" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection
