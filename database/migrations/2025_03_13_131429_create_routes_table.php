<?php

use App\Models\Station;
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
        Schema::create('routes', function (Blueprint $table) {
            $table->id()->from(500);
            $table->foreignId('start_station_id')->constrained('stations')->cascadeOnDelete();    
            $table->foreignId('end_station_id')->constrained('stations')->cascadeOnDelete();
            $table->json("allowed_stations");
            $table->decimal("distance", 10, 2);
            $table->unique(['start_station_id', 'end_station_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
