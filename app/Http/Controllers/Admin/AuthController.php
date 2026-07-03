<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session('admin_authenticated')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string'],
        ], [
            'password.required' => 'Veuillez saisir le mot de passe.',
        ]);

        $adminPassword = trim((string) (config('gigabits.admin_password') ?: env('ADMIN_PASSWORD', '')));
        $input = (string) $request->input('password');

        if ($adminPassword === '') {
            return back()->withErrors([
                'password' => 'L\'accès administrateur n\'est pas encore configuré. Contactez le développeur du site.',
            ]);
        }

        $valid = hash_equals($adminPassword, $input)
            || (str_starts_with($adminPassword, '$2y$') && Hash::check($input, $adminPassword));

        if (! $valid) {
            return back()->withErrors([
                'password' => 'Mot de passe incorrect. Réessayez.',
            ]);
        }

        $request->session()->regenerate();
        $request->session()->put('admin_authenticated', true);

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_authenticated');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Vous êtes déconnecté.');
    }
}
