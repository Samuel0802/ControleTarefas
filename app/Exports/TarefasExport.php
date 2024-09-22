<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;

class TarefasExport implements FromCollection
{
    //php artisan make:export TarefasExport  --model=Tarefa

    public function collection()
    {
        //Responsavel por recuperar todos os registro de tarefas
        return Tarefa::all();
    }
}
