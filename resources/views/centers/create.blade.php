@extends('layouts.app')
@section('title', 'Crear Centro')
@section('content')
    <h1>Crear Nuevo Centro</h1>
    @include('centers._form', ['action' => route('centers.store'), 'method' => 'POST'])
@endsection