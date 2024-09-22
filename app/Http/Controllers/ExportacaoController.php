<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\TarefasExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportacaoController extends Controller
{
    public function exportacao(){
        return Excel::download(new TarefasExport, 'lista_de_tarefa.xlsx');
    }
}
