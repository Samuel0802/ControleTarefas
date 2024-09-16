<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TarefasController;
use App\Mail\MensagemTesteMail;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/tarefa', TarefasController::class);

//Template Email
Route::get('/mensagem', function(){
  return new MensagemTesteMail;
});
