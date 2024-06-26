<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // Auto-incremental primary key
            $table->id();

            // User name
            $table->string('name');

            // Unique email address
            $table->string('email')->unique();

            // Nullable timestamp for email verification
            $table->timestamp('email_verified_at')->nullable();

            // User password
            $table->string('password');

            // Foreign key for role
            $table->string('role');
            $table->foreign('role')->references('role')->on('systemroles');

            /* Foreign key for role
            $table->foreignId('systemrole_id')->constrained('systemroles'); */

            // Laravel's built-in remember token for "remember me" functionality
            $table->rememberToken();

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
        // Drop the 'users' table if it exists
        Schema::dropIfExists('users');
    }
};
