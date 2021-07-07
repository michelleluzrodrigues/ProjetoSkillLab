<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\ProdutosController;

Route::get('/home',[ProdutosController::class, 'index']);
Route::any('/home/busca',[ProdutosController::class, 'busca']);


Route::get('/home/cadastro', [ProdutosController::class, 'create']);
Route::post('/home', [ProdutosController::class, 'store']);
Route::delete('/home/{id}', [ProdutosController::class, 'destroy']);
Route::get('/home/editar/{id}', [ProdutosController::class, 'edit']);
Route::post('home/editar/{id}',  [ProdutosController::class, 'update'])->name('alterar_produto');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
