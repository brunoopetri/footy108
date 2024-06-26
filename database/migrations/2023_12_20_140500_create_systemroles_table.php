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
        Schema::create('systemroles', function (Blueprint $table) {
            $table->id();
            $table->string('role')->unique();
            $table->timestamps();

            // Soft Deletes
            $table->softDeletes();
        });

        // Insert initial data
        DB::table('systemroles')->insert([
            ['role' => 'adm'],
            ['role' => 'dev'],
            ['role' => 'player'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('systemroles');
    }
};
