<form action="{{ $action }}" method="POST">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="denomination" class="form-label">Denominación</label>
        <input type="text" name="denomination" class="form-control" value="{{ old('denomination', $center->denomination ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="province" class="form-label">Provincia</label>
        <input type="text" name="province" class="form-control" value="{{ old('province', $center->province ?? '') }}" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('centers.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
