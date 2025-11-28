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
            $table->date('deadline_at')->nullable()->after('status');
            $table->text('answer')->nullable()->after('deadline_at');
            $table->timestamp('answered_at')->nullable()->after('answer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pqrs', function (Blueprint $table) {
            $table->dropColumn(['deadline_at', 'answer', 'answered_at']);
        });
    }
};
