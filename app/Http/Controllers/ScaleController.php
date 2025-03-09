<?php

namespace App\Http\Controllers;

use App\Models\Scale;
use Illuminate\Http\Request;

class ScaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scales = Scale::with('questions')->get(); // Obtenemos las escalas con sus preguntas relacionadas
        return view('scales.index', compact('scales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('scales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'value' => 'required|integer',
            'points' => 'required|integer',
        ]);
        Scale::create($validated);
        return redirect()->route('scales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $scale = Scale::with('questions')->findOrFail($id); // Obtenemos la escala con las preguntas
        return view('scales.show', compact('scale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $scale = Scale::findOrFail($id);
        return view('scales.edit', compact('scale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'value' => 'required|integer',
            'points' => 'required|integer',
        ]);
        $scale = Scale::findOrFail($id);
        $scale->update($validated);
        return redirect()->route('scales.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $scale = Scale::findOrFail($id);
        $scale->delete();
        return redirect()->route('scales.index');
    }
}
