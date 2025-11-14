<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

// App/Http/Controllers/Auth/RegisteredUserController.php

public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'regex:/^[A-Za-zÀ-ÿ\s]+$/', 'max:255', 
            function ($attribute, $value, $fail) { 
                if (strtolower($value) === 'admin') 
                    $fail('O nome "admin" não pode ser usado.'); 
            }
        ],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ], [
        'name.required'  => 'O campo nome é obrigatório.',
        'name.string'    => 'O nome deve ser um texto válido.',
        'name.regex'     => 'O nome deve conter apenas letras e espaços.',
        'name.max'       => 'O nome não pode ter mais de 255 caracteres.',

        'email.required'   => 'O campo e-mail é obrigatório.',
        'email.string'     => 'O e-mail deve ser um texto válido.',
        'email.lowercase'  => 'O e-mail deve estar em letras minúsculas.',
        'email.email'      => 'Digite um endereço de e-mail válido.',
        'email.max'        => 'O e-mail não pode ter mais de 255 caracteres.',
        'email.unique'     => 'Este e-mail já está sendo usado por outro usuário.',

        'password.required'   => 'O campo senha é obrigatório.',
        'password.confirmed'  => 'A confirmação de senha não confere.',
        'password.min'        => 'A senha deve conter pelo menos 8 caracteres.',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    event(new Registered($user));

    Auth::logout();

    session()->flash('success', 'Conta criada com sucesso! Faça login para continuar.');

    return redirect()->route('logar');
}

}
