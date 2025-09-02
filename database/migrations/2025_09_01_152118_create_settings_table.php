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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("logo")->nullable();
            $table->json("app_name")->nullable(); // متعدد اللغات
            $table->string("default_language")->default("ar");

            $table->string("facebook_url")->nullable();
            $table->string("twitter_url")->nullable();
            $table->string("youtube_url")->nullable();
            $table->string("instagram_url")->nullable();
            $table->string("snapchat_url")->nullable();

            $table->json("about_us")->nullable(); // متعدد اللغات
            $table->string("about_us_image")->nullable();
            $table->json("address")->nullable();
            $table->string("phone")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
