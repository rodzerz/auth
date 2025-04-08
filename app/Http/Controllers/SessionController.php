<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    // Izrakstīšanās metode
    public function destroy()
    {
        Auth::logout(); // Izbeidz lietotāja sesiju
        Session::invalidate(); // Notīra sesiju
        Session::regenerateToken(); // Regenerē CSRF tokenu

        return redirect('/'); // Pāradresē uz mājas lapu vai citu izvēlētu lapu
    }

    // Metode, kas atgriež login formu
    public function create()
    {
        return view('auth.login');  // Skats, kas satur login formu
    }

    // Metode, kas apstrādā datus no login formas
    public function store(Request $request)
    {
        // Validācija
        $validated = $request->validate([
            'email' => 'required|email',  // E-pastam jābūt derīgā formātā
            'password' => 'required|min:6', // Parolei jābūt vismaz 6 rakstzīmēm
        ]);

        // Ja autentifikācija nav veiksmīga
        if (!Auth::attempt($validated)) {
            // Izsistam ValidationException ar pielāgotu kļūdas ziņojumu
            throw ValidationException::withMessages([
                'email' => 'Nepareizs e-pasts vai parole.',
            ]);
        }
        $request->session()->regenerate();
        // Ja autentifikācija ir veiksmīga, lietotājs tiek novirzīts uz sākumlapu
        return redirect('/');
    }
}
