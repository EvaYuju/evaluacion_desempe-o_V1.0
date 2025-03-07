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
        Answer::create($request->all());
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
