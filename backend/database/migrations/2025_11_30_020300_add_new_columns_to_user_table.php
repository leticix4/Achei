<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cpf', 14)->unique()->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->default('other');
            $table->string('phone', 20);
            $table->foreignId('address_id')->constrained()->onDelete('cascade');
            $table->enum('role', ['admin', 'customer', 'vendor'])->default('customer');
        });
    }

    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign(['address_id']);

            $table->dropColumn([
                'cpf',
                'birth_date',
                'gender',
                'mobile_phone',
                'address_id',
                'role',
            ]);
        });
    }
};
