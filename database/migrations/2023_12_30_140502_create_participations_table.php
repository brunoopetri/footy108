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
        Schema::create('participations', function (Blueprint $table) {
            $table->id();
            $table->string('confirmation_status')->default(now());

            // Foreign key for users
            $table->foreignId('user_id')->nullable()->constrained('users');

            // Foreign key for games
            $table->foreignId('gamematches_id')->nullable()->constrained('gamematches');

            // Foreign key for games
            $table->foreignId('team_id')->nullable()->constrained('teams');

            $table->timestamps();

            // Soft Deletes
            $table->softDeletes();
        });

        DB::table('participations')->insert([
            ['confirmation_status' => 'yes'],
            ['confirmation_status' => 'no']
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('participations', function (Blueprint $table) {
            // Remova as chaves estrangeiras
            $table->dropForeign(['user_id']);
            $table->dropForeign(['game_id']);
            $table->dropForeign(['team_id']);
        });
    
        Schema::dropIfExists('participations');
    }
};
