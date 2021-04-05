<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EscalaController;
use App\Http\Controllers\MembroController;
use App\Http\Controllers\CidadeController;

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


//escala
Route::get('/', [EscalaController::class, 'index'])->name('escala.index');
Route::get('/escala', [EscalaController::class, 'index']);
Route::get('/escala/create', [EscalaController::class, 'create'])->name('escala.create');
Route::post('/escala', [EscalaController::class, 'store'])->name('escala.save');
Route::get('/escala/{id}', [EscalaController::class, 'show'])->name('escala.show');

//membros
Route::get('/membros', [MembroController::class, 'index'])->name('membros.index');

//municipios de uma regiao administrativa
Route::post('/municipios',[CidadeController::class, 'getMunicipios'])->name('municipio.show');
Route::get('/token',[CidadeController::class, 'getToken']);

