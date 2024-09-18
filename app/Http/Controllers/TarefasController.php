<?php

namespace App\Http\Controllers;

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
       $tarefa = Tarefa::create($request->all());

       return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);

    }


    public function show(Tarefa $tarefa)
    {
        //
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
