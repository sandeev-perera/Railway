<?php

use App\Models\BarCodeCard;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id()->from(50000000);
            $table->foreignId('bar_code_card_id')->nullable()->constrained()->nullOnDelete();            $table->decimal("Amount", 10, 2);
            $table->timestamp("Payment_Date")->default(DB::raw('CURRENT_DATE'));
            $table->enum("Payment_Mode",["Debit", "Credit","On Cash"])->default("On Cash");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
        
    }
};
