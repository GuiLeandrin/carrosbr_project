<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

//LOGIN
Route::get('/', function () {
    return view('auth.login');
})->name('logar');

//CADASTRO
Route::get('/registrar', function () {
    return view('auth.register');
})->name('registrar');

Route::middleware('auth')->group(function () {
    //HOME
    Route::prefix('home')->group(function () {
        Route::get('/', [CarController::class, 'showCards'])->name('home');
        Route::get('/details/{id}', [CarController::class, 'showDetails'])->name('car.details');
    });

    //PROFILE
    Route::prefix('config-user')->group(function () {
        Route::get('/show-profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/update-profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/edit-password-profile', function () {return view('profile.change-password');})->name('password.edit');
        Route::get('/delete-profile', function () {return view('profile.delete');})->name('profile.delete');
        Route::delete('/destroy-profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    //ADM
    Route::prefix('admin')->group(function () {    
        Route::get('/', function () {
            if (!Auth::check() || Auth::user()->name !== 'admin') {
                abort(403, 'Acesso negado');
            }
            return view('adm.welcome');
        })->name('painel.adm');
        //USUÁRIOS
        Route::get('/painel-user-list', function () {
            if (!Auth::check() || Auth::user()->name !== 'admin') {
                abort(403, 'Acesso negado');
            }
            return app(ProfileController::class)->list();
        })->name('painel.user.list');
        Route::get('/delete-profile-list/{id}', [ProfileController::class, 'destroyUser'])->name('painel.destroyUser');
        //CARROS
        Route::get('/painel-config-car', function () {
            if (!Auth::check() || Auth::user()->name !== 'admin') {
                abort(403, 'Acesso negado');
            }
            return app(CarController::class)->list();
        })->name('painel.config.car');
        Route::get('/painel-add-car', function () {
            if (!Auth::check() || Auth::user()->name !== 'admin') {
                abort(403, 'Acesso negado');
            }
            return view('adm.add-car');
        })->name('painel.add.car');
        Route::post('/painel-store-car', [CarController::class, 'store'])->name('painel.store.car');
        Route::get('/delete-car-list/{id}', [CarController::class, 'destroyCar'])->name('painel.destroyCar');
        Route::get('/painel-edit-car/{id}', function ($id) {
            if (!Auth::check() || Auth::user()->name !== 'admin') {
                abort(403, 'Acesso negado');
            }
            return app(CarController::class)->edit($id);
        })->name('painel.edit.car');
        Route::post('/update-car-list/{id}', [CarController::class, 'update'])->name('painel.update.car');
    });
});

require __DIR__.'/auth.php';
