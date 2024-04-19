<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;



Route::get('/todos', [TodoController::class, 'index']); //listar todas as tarefas
Route::put('/todos/{id}/complete', [TodoController::class, 'complete']); //marcar tarefa como concluída
Route::post('/create', [TodoController::class, 'create']); // Rota de criação
Route::get('/todos/{id}/edit', [TodoController::class, 'edit']); // Rota de edição
Route::put('/todos/{id}', [TodoController::class, 'update']); // Rota de atualização
Route::delete('/todos/{id}', [TodoController::class, 'delete']); // Rota de exclusão
Route::get('/todos/{id}', [TodoController::class, 'details']); // Rota de detalhes

