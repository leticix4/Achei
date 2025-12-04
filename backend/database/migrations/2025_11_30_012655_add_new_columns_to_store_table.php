<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Migration antiga desativada.
        // As colunas já foram incluídas diretamente na create_stores_table.
        // Mantida vazia para não quebrar o histórico de migrations.
    }

    public function down(): void
    {
        // Nada a reverter.
    }
};
