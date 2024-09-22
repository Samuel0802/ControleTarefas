<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\TarefasExport;
use Maatwebsite\Excel\Facades\Excel;


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
}
