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
        Schema::create('group_gamematches', function (Blueprint $table) {
            $table->id();

            // Foreign key for gamematches
            $table->foreignId('gamematch_id')->constrained('gamematches');

            // Foreign key for groups
            $table->foreignId('group_id')->constrained('groups');

            // Unique constraint combining both foreign keys
            $table->unique(['gamematch_id', 'group_id']);

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
        Schema::dropIfExists('group_gamematches');
    }
};
