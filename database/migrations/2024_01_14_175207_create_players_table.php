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
        Schema::create('players', function (Blueprint $table) {
            $table->id();

            // Foreign key for teams
            $table->foreignId('team_id')->constrained('teams');

            // Foreign key for users
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->where('role', 'player'); // Restriction for users with 'player' role

            // Foreign key for positions
            $table->foreignId('position_id')->constrained('positions');

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
        Schema::dropIfExists('players');
    }
};
