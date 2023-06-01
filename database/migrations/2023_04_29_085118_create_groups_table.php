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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('creater_id')->nullable();
            $table->foreign('creater_id')->references('id')->on('users');
            $table->timestamps();
            $table->boolean('is_party')->default(false);
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->json('users')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
