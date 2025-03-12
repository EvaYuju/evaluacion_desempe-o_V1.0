<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'nif' => 'required|string|max:9',
            'sex' => 'required|string',
            'center_id' => 'required|exists:centers,id',
            'role' => 'required|in:super_admin,admin,user',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            //'password' => Hash::make($request->password),
            'password' => bcrypt($request->password),
            'nif' => $request->nif,
            'sex' => $request->sex,
            'center_id' => $request->center_id,
            'role' => $request->role,
        ]);

        // Redirigir después de guardar
        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'nif' => 'required|string|max:9',
            'sex' => 'required|string',
            'center_id' => 'required|exists:centers,id',
            'role' => 'required|in:super_admin,admin,user',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'nif' => $request->nif,
            'sex' => $request->sex,
            'center_id' => $request->center_id,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
