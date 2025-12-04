<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Básico
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            // Tipo de usuário: pf ou pj (lojista também faz login aqui)
            $table->string('type')->default('pf'); // 'pf' ou 'pj'

            // Pessoa Física
            $table->string('cpf')->nullable()->unique();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();

            // Contato
            $table->string('phone'); // obrigatório
            $table->string('phone_secondary')->nullable();

            // Endereço
            $table->string('zip_code');
            $table->string('address');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('district');
            $table->string('city');
            $table->string('state');
            $table->string('reference')->nullable();

            // Papel (cliente / lojista)
            $table->string('role')->default('user'); // 'user' ou 'store'

            // Sistema
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
