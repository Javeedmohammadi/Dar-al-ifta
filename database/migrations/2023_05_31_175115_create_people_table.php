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
        Schema::create('people', function (Blueprint $table) {
            $table -> id();
            $table -> string('person_full_name');
            $table -> string('person_father_name');
            $table -> string('person_phone');
            $table -> string('person_email');
            $table -> text('person_question');            
            $table -> longText('views_counter')->nullable();            
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
