 
@extends('layouts.app')

@section('title', 'Detalle del Centro')

@section('content')
    <h1>Detalle del Centro</h1>
    <div class="card">
        <div class="card-header">
            <h3>{{ $center->denomination }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Provincia:</strong> {{ $center->province }}</p>
            <p><strong>Fecha de creación:</strong> {{ $center->created_at->format('d/m/Y') }}</p>
            <p><strong>Fecha de actualización:</strong> {{ $center->updated_at->format('d/m/Y') }}</p>

            <a href="{{ route('centers.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
@endsection
