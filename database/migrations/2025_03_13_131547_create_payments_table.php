<?php

use App\Models\BarCodeCard;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id()->from(50000000);
            $table->foreignIdFor(Passenger::class)->nullable()->constrained()->nullOnDelete();
            // $table->foreignId('bar_code_card_id')->nullable()->constrained()->nullOnDelete();            
            $table->decimal("Amount", 10, 2);
            $table->enum('payment_type', ['renewal', 'registration', 'fine']);
            $table->timestamp("payment_date")->default(DB::raw('CURRENT_DATE'));
            $table->enum("payment_mode",["Debit", "Credit","On Cash"])->default("On Cash");
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
