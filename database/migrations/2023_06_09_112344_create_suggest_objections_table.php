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
        Schema::create('suggest_objections', function (Blueprint $table) {
            $table -> id();
            $table -> string('suggest_name');
            $table -> string('suggest_phone');
            $table -> string('suggest_email');
            $table -> text('suggest_desc');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggest_objections');
    }
};
