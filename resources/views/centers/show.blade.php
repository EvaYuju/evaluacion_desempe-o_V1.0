@extends('layouts.app')
@section('title', 'Detalles del Centro')
@section('content')
    <h1>{{ $center->denomination }}</h1>
    <p><strong>ID:</strong> {{ $center->id }}</p>
    <p><strong>Provincia:</strong> {{ $center->province }}</p>
    <a href="{{ route('centers.index') }}" class="btn btn-secondary">Volver</a>
@endsection