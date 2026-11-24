<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bikes', function (Blueprint $table) {
            $table->string('tipo')->default('Urbana')->after('model');
            $table->text('descripcion')->nullable()->after('tipo');
            $table->string('imagen')->nullable()->after('descripcion');
        });
    }

    public function down(): void
    {
        Schema::table('bikes', function (Blueprint $table) {
            $table->dropColumn(['tipo', 'descripcion', 'imagen']);
        });
    }
};
