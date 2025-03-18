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

        <!-- Filtro de categorías para preguntas -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

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
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Crear Encuesta</button>
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
