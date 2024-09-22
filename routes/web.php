<?php

use App\Http\Controllers\ExportacaoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TarefasController;
use App\Mail\MensagemTesteMail;

Route::get('/', function () {
    return view('auth.login');
});

//Rota de Verificação de email
Auth::routes(['verify' => true]);

//Rota tela home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home')
->middleware('verified');

//Rota de Tarefas
Route::resource('/tarefa', TarefasController::class)
->middleware('verified');

// Route::get('tarefa/exportacao', [TarefasController::class, 'exportacao'])
// ->name('exportacao');

Route::get('/exportacao/{extensao}', [ExportacaoController::class, 'exportacao'])
    ->name('exportacao')
    ->middleware('verified');


//Template Email
Route::get('/mensagem', function(){
  return new MensagemTesteMail;
});
