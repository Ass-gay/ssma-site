<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.user.index', compact('users'));
    }



    public function store(Request $request)
    {
        $request->validate([

            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',

        ]);

        User::create([

            'nom' => $request->nom,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'role' => $request->role,

        ]);

        return back()->with('success', 'Utilisateur ajouté');
    }
}
