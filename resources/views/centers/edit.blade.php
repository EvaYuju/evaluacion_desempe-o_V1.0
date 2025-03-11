 
@extends('layouts.app')

@section('title', 'Editar Centro')

@section('content')
    <h1>Editar Centro</h1>
    <form action="{{ route('centers.update', $center->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="denomination" class="form-label">Denominación</label>
            <input type="text" class="form-control" name="denomination" value="{{ $center->denomination }}" required>
        </div>
        <div class="mb-3">
            <label for="province" class="form-label">Provincia</label>
            <input type="text" class="form-control" name="province" value="{{ $center->province }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection
