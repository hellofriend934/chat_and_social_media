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
        Schema::create('blocked_user_chats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(\App\Models\group::class,'group_id')->references('id')->on('groups');
            $table->foreignIdFor(\App\Models\User::class,'user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blocked_user_chats');
    }
};
