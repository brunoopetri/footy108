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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('position_name')->unique();;
            $table->timestamps();

            // Soft Deletes
            $table->softDeletes();
        });

         // Insert initial data
         DB::table('positions')->insert([
            ['position_name' => 'Defender'],
            ['position_name' => 'Forward'],
            ['position_name' => 'Goalkeeper'],
            ['position_name' => 'Midfielder'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
