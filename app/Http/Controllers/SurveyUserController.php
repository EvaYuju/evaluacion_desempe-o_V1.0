<?php

namespace App\Http\Controllers;

use App\Models\SurveyUser;
use Illuminate\Http\Request;

class SurveyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surveyUsers = SurveyUser::with(['user', 'survey'])->get(); // Obtenemos los usuarios con sus encuestas relacionadas
        return view('survey_users.index', compact('surveyUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('survey_users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'survey_id' => 'required|exists:surveys,id',
        ]);
        SurveyUser::create($validated);
        return redirect()->route('survey_users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $surveyUser = SurveyUser::with(['user', 'survey'])->findOrFail($id);
        return view('survey_users.show', compact('surveyUser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $surveyUser = SurveyUser::findOrFail($id);
        return view('survey_users.edit', compact('surveyUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'survey_id' => 'required|exists:surveys,id',
        ]);
        $surveyUser = SurveyUser::findOrFail($id);
        $surveyUser->update($validated);
        return redirect()->route('survey_users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surveyUser = SurveyUser::findOrFail($id);
        $surveyUser->delete();
        return redirect()->route('survey_users.index');
    }
}
