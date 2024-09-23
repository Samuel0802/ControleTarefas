<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\TarefasExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


class ExportacaoController extends Controller
{
    public function exportacao($extensao){

        $nome_arquivo = 'lista_de_tarefas';

       if($extensao == 'xlsx')
       {
       $nome_arquivo .= '.'.$extensao;
       }
       else if($extensao == 'csv')
       {
        $nome_arquivo .= '.'.$extensao;
       }
       else if($extensao == 'pdf')
       {
        $nome_arquivo .= '.'.$extensao;
       }
       else
       {
        return redirect()->route('tarefa.index');
       }

        return Excel::download(new TarefasExport, $nome_arquivo);
    }

  //Uso DOMPDF
    public function exportar(){

             $tarefas = auth()->user()->tarefas()->get(); //Recuperando as tarefas do user

        $pdf = Pdf::loadView('tarefa.pdf', ['tarefas' => $tarefas]);
        return $pdf->download('lista_de_tarefas.pdf');
    }
}
