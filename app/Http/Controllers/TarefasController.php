<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Validação de login de usuário

class TarefasController extends Controller
{
    //Implementando o Middleware auth
   public function __construct(){
    $this->middleware('auth');
   }


    public function index()
    {

    //    if(auth()->check()){
    //     $name = auth()->user()->name;
    //     return "Olá, $name";
    //    }else{
    //     return 'Você não está logado no sistema';
    //    }

 //Validação de login de usuário e recuperando os dados
    if(Auth::check()){

      $name = Auth::user()->name;

      return "Olá, $name";

    }else{

      return "Você não está logado";
    }
        return 'Chegamos até aqui';
    }

 //create ele joga para store para fazer o insert
    public function create()
    {
        return view('tarefa.create');
    }


    public function store(Request $request)
    {

         //Validação de campo

         $regras = [
            'tarefa' => 'required|min:3|max:256',
            'data_limite_conclusao' => 'required',
         ];

         $feedback = [
          'tarefa.min' => 'O campo tarefa deve ter no mínimo 3 caracteres',
          'tarefa.max' => 'O campo tarefa deve ter no maximo 256 caracteres',
         'required' => 'O campo :attribute deve ser preenchido',
         ];

         $request->validate($regras, $feedback);


       $tarefa = Tarefa::create($request->all());

       $destinatario = auth()->user()->email;//e-mail do usuário logado (autentificado)

       Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));//Disparando a mensagem conforme classe de email

       return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);

    }


    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', ['tarefa' => $tarefa]);
    }


    public function edit(Tarefa $tarefa)
    {
        //
    }


    public function update(Request $request, Tarefa $tarefa)
    {
        //
    }


    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
