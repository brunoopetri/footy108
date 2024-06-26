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
        Schema::create('gamematches', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(now());
            $table->time('start_time')->default(now());
            $table->time('end_time')->default(now());
            
            
            // Foreign key for locations
            $table->foreignId('location_id')->nullable()->constrained('locations');
            
            $table->string('status');

            // Timestamps for created_at and updated_at
            $table->timestamps();

            // Soft Deletes
            $table->softDeletes();
        });
         // Insert initial data
         DB::table('gamematches')->insert([
            ['status' => 'Upcoming'],
            ['status' => 'In progress'],
            ['status' => 'Finished'],
          ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gamematches');
    }
};
