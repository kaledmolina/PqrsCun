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
            $table->string('operator')->nullable()->after('cun');
            $table->string('document_type')->nullable()->after('document_number');
            $table->string('department')->nullable()->after('phone');
            $table->string('city')->nullable()->after('department');
            $table->string('subject_cun')->nullable()->after('type'); // For appeals/repositions
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pqrs', function (Blueprint $table) {
            //
        });
    }
};
