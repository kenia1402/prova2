<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;

Route::get('/', function () {
    // Retornar a view que você deseja exibir como página principal
    return view('welcome');
});
Route::group(['prefix' => 'user'], function () {
    Route::get('/filmes', [UserController::class, 'index'])->name('user.movies.index');
    // Defina outras rotas relacionadas ao usuário aqui
});

Route::get('/filmes', [FilmeController::class, 'index'])->name('filmes.index'); // Listagem de filmes
Route::get('/filmes/create', [FilmeController::class, 'create'])->name('filmes.create'); // Formulário de criação
Route::post('/filmes', [FilmeController::class, 'store'])->name('filmes.store'); // Salvar novo filme
Route::get('/filmes/{id}/edit', [FilmeController::class, 'edit'])->name('filmes.edit'); // Formulário de edição
Route::put('/filmes/{id}', [FilmeController::class, 'update'])->name('filmes.update'); // Atualizar filme
Route::delete('/filmes/{id}', [FilmeController::class, 'destroy'])->name('filmes.destroy'); // Excluir filme


