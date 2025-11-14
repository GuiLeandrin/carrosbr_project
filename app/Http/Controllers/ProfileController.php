<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->user()->save()) {
            return Redirect::route('profile.edit')->with('status', 'Perfil atualizado com sucesso!');
        } else {
            return Redirect::back()->with('error', 'Algo deu errado ao atualizar o perfil.');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ], [
            'password.required' => 'O campo senha é obrigatório.',
            'password.current_password' => 'A senha informada está incorreta.',
        ]);

        $user = $request->user();

        if ($user->name === 'admin') {
            return Redirect::back()
                ->withErrors(['password' => 'O admin não pode ser excluído.'], 'userDeletion')
                ->withInput();
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('sucesso', 'Conta excluída com sucesso.');
    }

    /**
     * Show the user's account.
     */
    public function show(Request $request): View
    {
        return view('profile.show', [
            'user' => $request->user(),
        ]);
    }

    /**
     * List the user's account.
     */
    public function list()
    {
        $users = User::select('id', 'name', 'email', 'created_at')->get();

        return view('adm.user-list', compact('users'));
    }

    /**
     * DestroyUser the user's account.
     */
    public function destroyUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Erro ao excluir usuário.');
        }

        if ($user->name === 'admin') {
            return redirect()->back()->with('error', 'O usuário "admin" não pode ser excluído.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Usuário excluído com sucesso!');
    }
}
