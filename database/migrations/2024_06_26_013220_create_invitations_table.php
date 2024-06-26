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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            
            // Foreign key for gamematches
            $table->foreignId('gamematch_id')->constrained('gamematches');
            
            // Foreign key for users
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->where('role', 'player'); // Restrição para usuários com papel 'player'
            
            
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            
            // Timestamps for created_at and updated_at
            $table->timestamps();

            // Soft Deletes
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
