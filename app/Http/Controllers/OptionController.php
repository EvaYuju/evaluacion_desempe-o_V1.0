<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Answer;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::with('answer')->get(); // Traemos las opciones con sus respuestas relacionadas
        return view('options.index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // return view('options.create');
        $questions = Question::all();  // Obtén todas las preguntas
        $answers = Answer::all();  // Obtén todas las respuestas
        return view('options.create', compact('questions', 'answers'));  // Devuelve la vista con las preguntas y respuestas
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',  // Validar si la pregunta existe
            'answer_id' => 'required|exists:answers,id',      // Validar si la respuesta existe
            'option_text' => 'required|string',                // Validar que el texto de la opción esté presente

        ]);
        Option::create([
            'question_id' => $validated['question_id'],  // Guardamos la relación con la pregunta
            'answer_id' => $validated['answer_id'],      // Guardamos la relación con la respuesta
            'option_text' => $validated['option_text'],  // Guardamos el texto de la opción
        ]);
        
        return redirect()->route('options.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $option = Option::with('answer')->findOrFail($id);
        return view('options.show', compact('option'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $option = Option::findOrFail($id);
        $questions = Question::all();  // Obtener todas las preguntas
        $answers = Answer::all();      // Obtener todas las respuestas
        return view('options.edit', compact('option', 'questions', 'answers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',  // Validar si la pregunta existe
            'answer_id' => 'required|exists:answers,id',      // Validar si la respuesta existe
            'option_text' => 'required|string',                // Validar el texto de la opción
        ]);
        $option = Option::findOrFail($id);
        $option->update([
            'question_id' => $validated['question_id'],  // Actualizar la relación con la pregunta
            'answer_id' => $validated['answer_id'],      // Actualizar la relación con la respuesta
            'option_text' => $validated['option_text'],  // Actualizar el texto de la opción
        ]);
        
        return redirect()->route('options.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $option = Option::findOrFail($id);
        $option->delete();
        return redirect()->route('options.index');
    }
}
