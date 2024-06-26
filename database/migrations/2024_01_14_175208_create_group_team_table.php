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
        Schema::create('group_teams', function (Blueprint $table) {
            $table->id();


            // Foreign keys referencing the 'groups' and 'teams' tables
            $table->foreignId('group_id')->constrained('groups');
            $table->foreignId('team_id')->constrained('teams');

            // Unique constraint combining both foreign keys
            $table->unique(['group_id', 'team_id']);

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
        Schema::dropIfExists('group_teams');
    }
};
