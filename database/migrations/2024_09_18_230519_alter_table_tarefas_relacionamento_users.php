<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('tarefas', function (Blueprint $table) {
            //after: após coluna id da tabela tarefas
            $table->unsignedBigInteger('user_id')->nullable()->after('id'); //Vai receber a chave estrangeira da tabela users
            $table->foreign('user_id')->references('id')->on('users');

        });
    }


    public function down(): void
    {
        Schema::table('tarefas', function (Blueprint $table) {
        //nome_da_tabela_nome_da_coluna_foreign
         $table->dropForeign('tarefas_user_id_foreign');
         $table->dropColumn('user_id');

        });
    }
};
