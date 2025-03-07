<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Center;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('center')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $centers = Center::all();
        return view('users.create', compact('centers'));
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $centers = Center::all();
        return view('users.edit', compact('user', 'centers'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

}
