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
        Schema::create('group_users', function (Blueprint $table) {
            $table->id();

            // Foreign keys referencing the 'groups' and 'users' tables
            $table->foreignId('group_id')->constrained('groups');
            $table->foreignId('user_id')->constrained('users');

            // Unique constraint combining both foreign keys
            $table->unique(['user_id', 'group_id']);

            // Timestamps for created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_users');
    }
};
