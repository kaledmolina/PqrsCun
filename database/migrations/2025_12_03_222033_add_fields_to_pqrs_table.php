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
        Schema::table('pqrs', function (Blueprint $table) {
            $table->string('contract_number')->nullable();
            $table->json('services')->nullable();
            $table->string('address')->nullable();
            $table->string('landline')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pqrs', function (Blueprint $table) {
            $table->dropColumn(['contract_number', 'services', 'address', 'landline']);
        });
    }
};
