@extends('layouts.app')

@section('title', 'Crear Encuesta')

@section('content')
    <h1>Crear Encuesta</h1>
    <form action="{{ route('surveys.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" name="description" id="description" required></textarea>
        </div>

<<<<<<< HEAD
        <!-- Filtro de categorías para preguntas -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select class="form-control" id="category_id" name="category_id" required>
=======
        <!-- Selección de categorías -->
        <div class="mb-3">
            <label for="category" class="form-label">Categoría</label>
            <select class="form-control" name="category_id" required>
>>>>>>> f413d2693453ba867d6cc0bf0c5aaaeb96cf779b
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

<<<<<<< HEAD
        <!-- Selector de preguntas filtrado por categoría -->
        <div class="mb-3">
            <label for="questions" class="form-label">Preguntas</label>
            <select class="form-control" name="questions[]" id="questions" multiple>
                <!-- Las preguntas se cargarán por JavaScript -->
            </select>
        </div>

        <!-- Selector de escalas -->
        <div class="mb-3">
            <label for="scales" class="form-label">Escalas</label>
            <select class="form-control" name="scales[]" id="scales" multiple>
                @foreach($scales as $scale)
                    <option value="{{ $scale->id }}">{{ $scale->title }}</option>
=======
        <!-- Selección de escalas -->
        <div class="mb-3">
            <label for="scale" class="form-label">Escala</label>
            <select class="form-control" name="scale_id" required>
                @foreach($scales as $scale)
                    <option value="{{ $scale->id }}">{{ $scale->title }} ({{ $scale->value }})</option>
>>>>>>> f413d2693453ba867d6cc0bf0c5aaaeb96cf779b
                @endforeach
            </select>
        </div>

<<<<<<< HEAD
        <button type="submit" class="btn btn-success">Crear Encuesta</button>
=======
        <!-- Asignación de usuarios -->
        <div class="mb-3">
            <label for="users" class="form-label">Asignar Empleados</label>
            <select class="form-control" name="user_ids[]" multiple required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
>>>>>>> f413d2693453ba867d6cc0bf0c5aaaeb96cf779b
    </form>

    <script>
        // JavaScript para actualizar las preguntas según la categoría seleccionada
        document.getElementById('category_id').addEventListener('change', function() {
            const categoryId = this.value;

            fetch(`/api/category/${categoryId}/questions`)
                .then(response => response.json())
                .then(data => {
                    const questionsSelect = document.getElementById('questions');
                    questionsSelect.innerHTML = ''; // Limpiar las opciones anteriores

                    data.questions.forEach(function(question) {
                        const option = document.createElement('option');
                        option.value = question.id;
                        option.textContent = question.question;
                        questionsSelect.appendChild(option);
                    });
                });
        });
    </script>
@endsection
