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
        Schema::create('program_fags', function (Blueprint $table) {
            $table->id();
            $table->foreignId("program_id")->constrained("programs")->onDelete("cascade");
            $table->json("question");
            $table->json("answer");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('porgram_fags');
    }
};
