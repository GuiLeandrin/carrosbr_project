<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();

            $request->session()->regenerate();

            session()->flash('success', 'Login realizado com sucesso! Bem-vindo.');

            return redirect()->intended(route('home', absolute: false));

        } catch (ValidationException $e) {
            return back()->withErrors([
                'email' => 'As credenciais fornecidas estão incorretas.',
            ])->onlyInput('email');
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('logar')->with('logout', 'Conta Deslogada!');
    }
}
