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
        Question::create($request->all());
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
