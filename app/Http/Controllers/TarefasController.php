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
     $user_id = auth()->user()->id; //recuperando id do users autenticado
    $tarefas = Tarefa::where('user_id', $user_id)->paginate(10);  //Validação de login de usuário e recuperando os dados

  return view('tarefa.index', ['tarefas' => $tarefas]);
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

       $dados = $request->all('tarefa','data_limite_conclusao'); //os atributos que serão recuperado para create receber
       $dados  ['user_id'] = auth()->user()->id; //Associando o users a tarefa

       $tarefa = Tarefa::create($dados);

       $destinatario = auth()->user()->email;//enviar e-mail do usuário logado (autentificado)

       Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));//Disparando a mensagem conforme classe de email

       return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);

    }


    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', ['tarefa' => $tarefa]);
    }


    public function edit(Tarefa $tarefa)
    {
        $user_id = auth()->user()->id; //

        //se user_id de tarefa for igual user autenticado carregar tarefa.edit
        //validando a rota/id
      if($tarefa->user_id == $user_id){
        return view('tarefa.edit', ['tarefa' => $tarefa]);
      }
    return view('acesso-negado');
    }


    public function update(Request $request, Tarefa $tarefa)
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

             $user_id = auth()->user()->id;

              //se user_id de tarefa for igual user autenticado carregar tarefa.show
           //Validando id do update para não ser mudado
             if($tarefa->user_id == $user_id){

                $tarefa->update($request->all());
                return redirect()->route('tarefa.show',['tarefa' => $tarefa]);
             }

             return view('acesso-negado');

    }


    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
