<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('responsible');

            $table->string('trade_name');
            $table->string('state_registration');
            $table->string('cnpj', 18)->unique();
            $table->string('additional_phone', 20)->nullable();

            $table->foreignId('address_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('store', function (Blueprint $table) {
            //
        });
    }
};
