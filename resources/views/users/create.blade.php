@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<h1>Crear Usuario</h1>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
        <input type="password" class="form-control" name="password_confirmation" required>
    </div>
    <div class="mb-3">
        <label for="nif" class="form-label">NIF</label>
        <input type="text" class="form-control" name="nif" required>
    </div>
    <div class="mb-3">
        <label for="sex" class="form-label">Sexo</label>
        <input type="text" class="form-control" name="sex" required>
    </div>
    <div class="mb-3">
        <label for="center_id" class="form-label">Centro</label>
        <select class="form-control" name="center_id" required>
            @foreach($centers as $center)
            <option value="{{ $center->id }}">{{ $center->denomination }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Rol</label>
        <select class="form-control" name="role">
            <option value="super_admin">Super Admin</option>
            <option value="admin">Admin</option>
            <option value="user" selected>Usuario</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>

@endsection