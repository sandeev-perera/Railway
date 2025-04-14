<?php

use App\Models\CardConfig;
use App\Models\Passenger;
use App\Models\Route;
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
            $table->foreignIdFor(Route::class)->constrained();
            $table->enum("class", ["1st", "2nd", "3rd"]);        
            $table->enum("ticket_duration", ["M", "Q"]);
            $table->decimal('price', 7, 2);
            $table->date("start_date")->default(DB::raw('CURRENT_DATE'));
            $table->date("expire_date");
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
