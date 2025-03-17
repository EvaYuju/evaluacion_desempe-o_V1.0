<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Category;
use App\Models\Scale;
use App\Models\User;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        // Obtener las categorías, escalas y usuarios
        $categories = Category::all();
        $scales = Scale::all();
        $users = User::all(); // O filtrar según la lógica de tu aplicación

        return view('surveys.create', compact('categories', 'scales', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        $categories = Category::all();
        $scales = Scale::all();
        $users = User::all();
        
        return view('surveys.edit', compact('survey', 'categories', 'scales', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
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
