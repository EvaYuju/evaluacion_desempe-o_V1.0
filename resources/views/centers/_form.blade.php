 
<form action="{{ $action }}" method="POST">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $center->name ?? '') }}" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('centers.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
