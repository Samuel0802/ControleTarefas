<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
