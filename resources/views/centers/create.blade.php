 
@extends('layouts.app')

@section('title', 'Crear Centro')

@section('content')
    <h1>Crear Centro</h1>
    <form action="{{ route('centers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="denomination" class="form-label">Denominación</label>
            <input type="text" class="form-control" name="denomination" required>
        </div>
        <div class="mb-3">
            <label for="province" class="form-label">Provincia</label>
            <input type="text" class="form-control" name="province" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection
