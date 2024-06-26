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
        Schema::create('systemrole_users', function (Blueprint $table) {
            $table->id();

            // Foreign keys referencing the 'users' and 'system_roles' tables
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('systemrole_id')->constrained('systemroles');

            // Unique constraint combining both foreign keys
            $table->unique(['user_id', 'systemrole_id']);

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
        Schema::dropIfExists('systemrole_users');
    }
};
