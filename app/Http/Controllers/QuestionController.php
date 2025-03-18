<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Survey;
use App\Models\Category;
use App\Models\Scale;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::with('survey', 'category', 'scale')->get();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        $surveys = Survey::all();
        $categories = Category::all();
        $scales = Scale::all();
        return view('questions.create', compact('surveys', 'categories', 'scales'));
    }

    public function store(Request $request)
    {
         // Validar la entrada
    $validated = $request->validate([
        'question' => 'required|string|max:255',
        'survey_id' => 'required|exists:surveys,id',
        'category_id' => 'required|exists:categories,id',
        'scale_id' => 'required|exists:scales,id',
    ]);

     // Crear la nueva pregunta con las relaciones
     Question::create([
        'question' => $validated['question'], 
        'survey_id' => $validated['survey_id'],
        'category_id' => $validated['category_id'],
        'scale_id' => $validated['scale_id'],

    ]);

    return redirect()->route('questions.index');
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        $surveys = Survey::all();
        $categories = Category::all();
        $scales = Scale::all();
        return view('questions.edit', compact('question', 'surveys', 'categories', 'scales'));
    }

    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return redirect()->route('questions.index');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index');
    }

}
