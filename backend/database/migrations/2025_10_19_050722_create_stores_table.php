<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();

            // Relação com user (login do lojista)
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Dados da empresa
            $table->string('name');                // razão social
            $table->string('trade_name');          // nome fantasia
            $table->string('cnpj')->unique();
            $table->string('state_registration')->nullable();
            $table->string('phone');
            $table->string('additional_phone')->nullable();

            // Endereço da loja (se quiser usar depois)
            $table->unsignedBigInteger('address_id')->nullable();

            // Dados da loja
            $table->string('category')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('is_active')->default(true);

            // Localização
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
