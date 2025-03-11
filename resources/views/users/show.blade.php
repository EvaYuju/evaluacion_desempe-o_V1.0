 
@extends('layouts.app')

@section('title', 'Detalle de Usuario')

@section('content')
    <h1>Detalle de Usuario</h1>
    <div class="card">
        <div class="card-header">
            <h3>{{ $user->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Correo:</strong> {{ $user->email }}</p>
            <p><strong>Rol:</strong> {{ ucfirst($user->role) }}</p>
            <p><strong>Centro:</strong> {{ $user->center ? $user->center->name : 'No asignado' }}</p>

            <a href="{{ route('users.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
@endsection
