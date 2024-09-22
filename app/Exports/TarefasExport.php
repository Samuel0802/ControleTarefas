<?php

namespace App\Exports;

use App\Models\Tarefa;

use Maatwebsite\Excel\Concerns\FromCollection;

class TarefasExport implements FromCollection
{
    //php artisan make:export TarefasExport  --model=Tarefa

    public function collection()
    {
        //baixando tarefas apenas do user autenticado no sistema
        return auth()->user()->tarefas()->get();
    }

}
