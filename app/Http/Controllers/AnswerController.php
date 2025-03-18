<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $answers = Answer::with('question')->get();
        return view('answers.index', compact('answers'));
    }

    public function create()
    {
        $questions = Question::all();
        return view('answers.create', compact('questions'));
    }


    public function store(Request $request)
    {
        // Validación de respuesta
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'question_id' => 'required|exists:questions,id',
            'response' => 'nullable|string', // Solo si la respuesta es libre
            'option_id' => 'nullable|exists:options,id', // Solo si es opción múltiple
        ]);

        // Si la respuesta es de opción múltiple, guarda la opción seleccionada
        $answerData = [
            'user_id' => $request->user_id,
            'question_id' => $request->question_id,
            'response' => $request->response ?: null, // Si no es opción, usar respuesta libre
            'option_id' => $request->option_id ?: null, // Guardar la opción seleccionada si es de opción múltiple
        ];

        // Crear la respuesta
        Answer::create($answerData);

        return redirect()->route('answers.index');
    }

    public function show(Answer $answer)
    {
        return view('answers.show', compact('answer'));
    }

    public function edit(Answer $answer)
    {
        $questions = Question::all();
        return view('answers.edit', compact('answer', 'questions'));
    }

    public function update(Request $request, Answer $answer)
    {
        $answer->update($request->all());
        return redirect()->route('answers.index');
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
        return redirect()->route('answers.index');
    }
}
