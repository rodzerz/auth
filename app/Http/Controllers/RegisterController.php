<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    // Metode, kas atgriež reģistrācijas skatu
    public function create()
    {
        return view('auth.register');
    }

    // Metode, kas apstrādā reģistrācijas datus
    public function store(Request $request)
    {
        // Datu validācija
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', Password::min(6)->numbers()->letters()->symbols(), 'confirmed',]
        ]);
        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Parole tiek šifrēta
        ]);

        Auth::login($user);
        return redirect('/');
    
    }
}
