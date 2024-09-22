<?php

namespace App\Exports;

use App\Models\Tarefa;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TarefasExport implements FromCollection, WithHeadings
{
    //php artisan make:export TarefasExport  --model=Tarefa

    public function collection()
    {
        //baixando tarefas apenas do user autenticado no sistema
        return auth()->user()->tarefas()->get();
    }


    public function headings():array //declarando o tipo de retorno
    {
        //linha de titulo dos arquivos que esta exportando
        return [
            'ID da Tarefa',
            'ID do Usuário',
            'Tarefa',
            'Data limite conclusão',
            'Data criação',
            'Data atualização',
        ];
    }

}
