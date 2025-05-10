<?php

use App\Models\Passenger;
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
        Schema::create('journeys', function (Blueprint $table) {
            $table->id()->from(3000);
            $table->foreignIdFor(Passenger::class);
            $table->foreignId('start_station_id')->constrained('stations');    
            $table->foreignId('end_station_id')->nullable()->constrained('stations');
            $table->dateTime('checked_out_time')->nullable();
            $table->enum("status", ['Ongoing', 'Completed', 'Suspecious', 'Illegal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journeys');
    }
};
