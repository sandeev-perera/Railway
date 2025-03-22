<?php

use App\Models\Route;
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
        Schema::create('card_configs', function (Blueprint $table) {
            $table->id()->from(3000);
            $table->foreignIdFor(Route::class)->constrained()->cascadeOnDelete();
            $table->enum("Class_Type", ["1", "2", "3"]);
            $table->decimal("Price", 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_configs');
    }
};
