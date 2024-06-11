<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
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

Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pokemon', [PokemonController::class, 'index'])->name('pokemon');

Route::delete('/pokemon/{id}', [PokemonController::class, 'destroy'])->name('pokemon.destroy');

Route::get('/pokemon/{id}/edit', [PokemonController::class, 'edit'])->name('pokemon.edit');

Route::put('/pokemon/{id}', [PokemonController::class, 'update'])->name('pokemon.update');

Route::post('/pokemon', [PokemonController::class, 'store'])->name('pokemon.store');

Route::get('/pokemon/create', [PokemonController::class, 'create'])->name('pokemon.create');
