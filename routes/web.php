<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::view('/', 'index')->name('index');
// Route::view('/login', 'login')->name('login');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/administrador/home', function () {
    return view('/administrador/home');
})->middleware(['auth', 'verified'])->name('administrador');

Route::get('/bodeguista/home', function () {
    return view('/bodeguista/home');
})->middleware(['auth', 'verified'])->name('bodeguista');

Route::get('/vendedor/home', function () {
    return view('/vendedor/home');
})->middleware(['auth', 'verified'])->name('vendedor');

Route::get('/mi_perfil', function () {
    return view('vistas_compartidas/mi_perfil');
})->middleware(['auth', 'verified'])->name('mi_perfil');




// Gestion de Usuarios Controller

// Route::get('/gestion_usuario', function () {
//     return view('/administrador/gestion_usuario/gestion_usuarios');
// })->middleware(['auth', 'verified'])->name('admin_gestion_usuario');

Route::get('/gestion_usuario',[UsuariosController::class, 'index'])
->middleware(['auth', 'verified'])->name('admin_gestion_usuario');

Route::post('gestion_usuario',[UsuariosController::class, 'show'])
->middleware(['auth', 'verified'])->name('gestion_usuario.show');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
