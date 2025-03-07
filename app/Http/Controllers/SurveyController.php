<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
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

    public function create()
    {
        return view('surveys.create');
    }

    public function store(Request $request)
    {
        Survey::create($request->all());
        return redirect()->route('surveys.index');
    }

    public function show(Survey $survey)
    {
        return view('surveys.show', compact('survey'));
    }

    public function edit(Survey $survey)
    {
        return view('surveys.edit', compact('survey'));
    }

    public function update(Request $request, Survey $survey)
    {
        $survey->update($request->all());
        return redirect()->route('surveys.index');
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->route('surveys.index');
    }

}
