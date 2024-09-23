<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TarefasExport implements FromCollection, WithHeadings, WithMapping
{
    //php artisan make:export TarefasExport  --model=Tarefa

    public function collection()
    {
        // Baixando tarefas apenas do user autenticado no sistema
        return auth()->user()->tarefas()->get();
    }

    public function headings(): array // Declarando o tipo de retorno
    {
        // Linha de título dos arquivos que está exportando
        return [
            'ID da Tarefa',
            'Tarefa',
            'Data limite conclusão',

        ];
    }
   //parametro $linha = recupera a tarefas
    public function map($linha): array
    {
        // Mapeamento dos dados da tarefa
        return [
            $linha->id,
            $linha->tarefa, // Ou o campo da tarefa que você deseja exibir
           date('d/m/Y', strtotime($linha->data_limite_conclusao))

        ];
    }
}
