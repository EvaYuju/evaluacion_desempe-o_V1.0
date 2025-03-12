@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<h1>Editar Usuario</h1>
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo</label>
        <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="password">
        @if($errors->has('password'))
        <div class="alert alert-danger mt-1">
            {{ $errors->first('password') }}
        </div>
        @endif
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
        <input type="password" class="form-control" name="password_confirmation">
    </div>
    <div class="mb-3">
        <label for="nif" class="form-label">NIF</label>
        <input type="text" class="form-control" name="nif" value="{{ $user->nif }}" required>
    </div>
    <div class="mb-3">
        <label for="sex" class="form-label">Sexo</label>
        <input type="text" class="form-control" name="sex" value="{{ $user->sex }}" required>
    </div>
    <div class="mb-3">
        <label for="center_id" class="form-label">Centro</label>
        <select class="form-control" name="center_id" required>
            @foreach($centers as $center)
            <option value="{{ $center->id }}" {{ $center->id == $user->center_id ? 'selected' : '' }}>
                {{ $center->denomination }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="role" class="form-label">Rol</label>
        <select class="form-control" name="role">
            <option value="super_admin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Usuario</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
</form>
@endsection