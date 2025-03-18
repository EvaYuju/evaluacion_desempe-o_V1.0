@extends('layouts.app')

@section('title', 'Crear Respuesta')

@section('content')
    <h1>Crear Respuesta</h1>
    <form action="{{ route('answers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select class="form-control" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="question_id" class="form-label">Pregunta</label>
            <select class="form-control" name="question_id" id="question_id" required>
                @foreach($questions as $question)
                    <option value="{{ $question->id }}">{{ $question->question }}</option>
                @endforeach
            </select>
        </div>

        <!-- Si la pregunta es de opción múltiple, mostrar las opciones -->
        <div class="mb-3" id="options_container" style="display:none;">
            <label for="option_id" class="form-label">Opción</label>
            <select class="form-control" name="option_id" id="option_id">
                <!-- Las opciones se cargarán dinámicamente -->
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>

    <script>
        document.getElementById('question_id').addEventListener('change', function() {
            const questionId = this.value;

            // Hacer una solicitud para obtener las opciones de la pregunta seleccionada
            fetch(`/api/question/${questionId}/options`)
                .then(response => response.json())
                .then(data => {
                    const optionsContainer = document.getElementById('options_container');
                    const optionsSelect = document.getElementById('option_id');
                    optionsSelect.innerHTML = ''; // Limpiar las opciones anteriores

                    if (data.options.length > 0) {
                        optionsContainer.style.display = 'block'; // Mostrar las opciones
                        data.options.forEach(function(option) {
                            const optionElement = document.createElement('option');
                            optionElement.value = option.id;
                            optionElement.textContent = option.option_text;
                            optionsSelect.appendChild(optionElement);
                        });
                    } else {
                        optionsContainer.style.display = 'none'; // Ocultar si no tiene opciones
                    }
                });
        });
    </script>
@endsection
