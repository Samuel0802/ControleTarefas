<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('tarefa', 256);
            $table->date('data_limite_conclusao');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
