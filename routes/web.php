<?php

use App\Enums\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PlataformaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'plataforma'], function () {
    Route::get('/', [PlataformaController::class, 'index'])->name('plataforma.index');
    Route::get('/create', [PlataformaController::class, 'create'])->name('plataforma.create');
    Route::post('/', [PlataformaController::class, 'store'])->name('plataforma.store');
    Route::get('{id}/edit', [PlataformaController::class, 'edit'])->name('plataforma.edit');
    Route::put('/{id}', [PlataformaController::class, 'update'])->name('plataforma.update');
    Route::delete('{id}/destroy', [PlataformaController::class, 'destroy'])->name('plataforma.destroy');
});

Route::group(['prefix' => 'cliente'], function () {
    Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/create', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('{id}/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::put('/{id}', [ClienteController::class, 'update'])->name('cliente.update');
    Route::delete('{id}/destroy', [ClienteController::class, 'destroy'])->name('cliente.destroy');
});

Route::group(['prefix' => 'cuenta'], function () {
    Route::get('/', [CuentaController::class, 'index'])->name('cuenta.index');
    Route::get('/create', [CuentaController::class, 'create'])->name('cuenta.create');
    Route::post('/', [CuentaController::class, 'store'])->name('cuenta.store');
    Route::get('{id}/edit', [CuentaController::class, 'edit'])->name('cuenta.edit');
    Route::put('/{id}', [CuentaController::class, 'update'])->name('cuenta.update');
    Route::delete('{id}/destroy', [CuentaController::class, 'destroy'])->name('cuenta.destroy');
});

Route::group(['prefix' => 'perfil'], function () {
    Route::get('/', [PerfilController::class, 'index'])->name('perfil.index');
    Route::get('/create', [PerfilController::class, 'create'])->name('perfil.create');
    Route::post('/', [PerfilController::class, 'store'])->name('perfil.store');
    Route::get('{id}/edit', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::put('/{id}', [PerfilController::class, 'update'])->name('perfil.update');
    Route::delete('{id}/destroy', [PerfilController::class, 'destroy'])->name('perfil.destroy');
});

Route::group([
    'prefix' => 'users',
    'middleware' => ['auth', 'role.admin'],
    'controller' => UserController::class,
], function () {
    Route::get('/', 'listAll')->name('users.listAll');
    Route::get('/banned', 'bannedListAll')->name('users.banned.listAll');
    Route::post('/banned/{user}', 'bannedListAdd')->name('users.banned.listAdd');
    Route::get('/notbanned', 'notBannedListAll')->name('users.notbanned.listAll');
    Route::post('/notbanned/{user}', 'notBannedListAdd')->name('users.notbanned.listAdd');
});
require __DIR__ . '/auth.php';
