<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Scale;
use App\Models\Category;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();
        return view('surveys.index', compact('surveys'));
    }

    public function create()
    {
        $questions = Question::all();
        $scales = Scale::all();
        $categories = Category::all();  
        return view('surveys.create', compact('questions', 'scales', 'categories'));
    }

    public function store(Request $request)
    {
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
    }

    public function show(Survey $survey)
    {
        return view('surveys.show', compact('survey'));
    }

    public function edit(Survey $survey)
    {
        $questions = Question::all();
        $scales = Scale::all();
        $survey->load('questions', 'scales'); // Asegúrate de cargar las relaciones necesarias
        return view('surveys.edit', compact('survey', 'questions', 'scales'));
    }

    public function update(Request $request, Survey $survey)
    {
        $survey->update($request->all());

        if ($request->questions) {
            $survey->questions()->sync($request->questions);
        }

        return redirect()->route('surveys.index');
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->route('surveys.index');
    }
}
