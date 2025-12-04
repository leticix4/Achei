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
            
            // Dados Básicos
            $table->string('name'); // Nome Completo ou Razão Social
            $table->string('email')->unique();
            $table->string('password');
            $table->string('type')->default('pf'); // 'pf' ou 'pj'
            
            // Campos de Pessoa Física
            $table->string('cpf')->nullable()->unique();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            
            // Campos de Pessoa Jurídica
            $table->string('cnpj')->nullable()->unique();
            $table->string('fantasy_name')->nullable(); // Nome Fantasia
            $table->string('state_registration')->nullable(); // Inscrição Estadual
            $table->string('contact_name')->nullable(); // Nome do Contato
            $table->string('contact_cpf')->nullable(); // CPF do Contato
            
            // Contato
            $table->string('phone'); // Celular
            $table->string('phone_secondary')->nullable(); // Telefone Adicional
            
            // Endereço 
            $table->string('zip_code'); // CEP
            $table->string('address'); // Rua/Endereço
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('district'); // Bairro
            $table->string('city');
            $table->string('state');
            $table->string('reference')->nullable();

            // Sistema
            $table->string('role')->default('user'); // 'user', 'admin', 'store'
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // ... (mantenha o resto das tabelas password_reset_tokens e sessions como estão)
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
