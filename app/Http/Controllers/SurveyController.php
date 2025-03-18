<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
<<<<<<< HEAD
use App\Models\Question;
use App\Models\Scale;
use App\Models\Category;
=======
use App\Models\Category;
use App\Models\Scale;
use App\Models\User;
>>>>>>> f413d2693453ba867d6cc0bf0c5aaaeb96cf779b

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();
        return view('surveys.index', compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        $questions = Question::all();
        $scales = Scale::all();
        $categories = Category::all();  
        return view('surveys.create', compact('questions', 'scales', 'categories'));
=======
        // Obtener las categorías, escalas y usuarios
        $categories = Category::all();
        $scales = Scale::all();
        $users = User::all(); // O filtrar según la lógica de tu aplicación

        return view('surveys.create', compact('categories', 'scales', 'users'));
>>>>>>> f413d2693453ba867d6cc0bf0c5aaaeb96cf779b
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        // Validar que los campos sean correctos
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'questions' => 'required|array',
            'scales' => 'required|array',
        ]);

        // Crear la encuesta
        $survey = Survey::create($request->all());

        // Asociar preguntas y escalas
        $survey->questions()->sync($request->questions);
        $survey->scales()->sync($request->scales);

        return redirect()->route('surveys.index');
=======
        // Validar los datos del formulario
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'scale_id' => 'required|exists:scales,id',
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
        ]);

        // Crear la encuesta
        $survey = Survey::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'scale_id' => $validated['scale_id'],
        ]);

        // Asignar usuarios a la encuesta (relación muchos a muchos)
        $survey->users()->attach($validated['user_ids']);

        return redirect()->route('surveys.index')->with('success', 'Encuesta creada exitosamente');
>>>>>>> f413d2693453ba867d6cc0bf0c5aaaeb96cf779b
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        return view('surveys.show', compact('survey'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
<<<<<<< HEAD
        $questions = Question::all();
        $scales = Scale::all();
        $survey->load('questions', 'scales'); // Asegúrate de cargar las relaciones necesarias
        return view('surveys.edit', compact('survey', 'questions', 'scales'));
=======
        $categories = Category::all();
        $scales = Scale::all();
        $users = User::all();
        
        return view('surveys.edit', compact('survey', 'categories', 'scales', 'users'));
>>>>>>> f413d2693453ba867d6cc0bf0c5aaaeb96cf779b
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
<<<<<<< HEAD
        $survey->update($request->all());

        if ($request->questions) {
            $survey->questions()->sync($request->questions);
        }

        return redirect()->route('surveys.index');
=======
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'scale_id' => 'required|exists:scales,id',
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
        ]);

        // Actualizar la encuesta
        $survey->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'scale_id' => $validated['scale_id'],
        ]);

        // Asignar usuarios a la encuesta
        $survey->users()->sync($validated['user_ids']);  // Sincroniza los usuarios asignados

        return redirect()->route('surveys.index')->with('success', 'Encuesta actualizada exitosamente');
>>>>>>> f413d2693453ba867d6cc0bf0c5aaaeb96cf779b
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->route('surveys.index')->with('success', 'Encuesta eliminada exitosamente');
    }
}
