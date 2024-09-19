<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TarefasController;
use App\Mail\MensagemTesteMail;

Route::get('/', function () {
    return view('auth.login');
});

//Rota de Verificação de email
Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
// ->name('home')
// ->middleware('verified');

Route::resource('/tarefa', TarefasController::class)
->middleware('verified');

//Template Email
Route::get('/mensagem', function(){
  return new MensagemTesteMail;
});
