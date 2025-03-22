<?php

use App\Models\CardConfig;
use App\Models\Passenger;
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
        Schema::create('bar_code_cards', function (Blueprint $table) {
            $table->id()->from(1000000);
            $table->foreignIdFor(Passenger::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(CardConfig::class)->constrained();
            $table->enum("Ticket_Duration", ["M", "Q"]);
            $table->date("Start_Date")->default(DB::raw('CURRENT_DATE'));
            $table->date("End_Date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bar_code_cards');
    }
};
