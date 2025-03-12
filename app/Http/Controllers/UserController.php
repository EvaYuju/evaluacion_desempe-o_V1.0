<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Center;
use Illuminate\Support\Facades\Log;

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
            'password' => Hash::make($request->password),
            //'password' => bcrypt($request->password),
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
        // Reglas básicas para los demás campos
        $rules = [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'nif'       => 'required|string|max:9',
            'sex'       => 'required|string',
            'center_id' => 'required|exists:centers,id',
            'role'      => 'required|in:super_admin,admin,user',
        ];

        // Si se ingresa algo en alguno de los campos de contraseña, se exige que ambos se llenen
        if ($request->filled('password') || $request->filled('password_confirmation')) {
            $rules['password'] = 'required|string|min:6|confirmed';
        }
        // Mensajes de error personalizados
        $messages = [
            'password.confirmed' => 'La contraseña y su confirmación deben coincidir.',
            'password.min'       => 'La contraseña debe tener al menos 6 caracteres.',
        ];

        $request->validate($rules, $messages);

        // Preparamos los datos a actualizar
        $data = $request->only(['name', 'email', 'nif', 'sex', 'center_id', 'role']);

        // Solo actualizamos la contraseña si se ha ingresado un valor
        if ($request->filled('password')) {
            $hashedPassword = Hash::make($request->password);
            Log::info('Contraseña hasheada: ' . $hashedPassword);
            $data['password'] = $hashedPassword;
        }

        // DEBUG: Ver qué datos está enviando Laravel a la BD
        //dd($data);

        Log::info('Datos antes de la actualización:', $user->toArray());
        $user->update($data);
        Log::info('Datos actualizados para el usuario ID: ' . $user->id);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
