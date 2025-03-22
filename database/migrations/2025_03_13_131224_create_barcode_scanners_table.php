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
        Schema::create('barcode_scanners', function (Blueprint $table) {
            $table->id()->from(4000);
            $table->foreignIdFor(Station::class)->nullable()->constrained()->cascadeOnDelete();
            $table->enum("Scanner_Location", ["Entry", "Exit", "Standby"])->default("Standby");
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barcode_scanners');
    }
};
