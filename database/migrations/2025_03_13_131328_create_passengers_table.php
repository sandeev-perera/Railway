<?php

use App\Models\Applicant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{

    public function up(): void
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->id()->from(5000);
            $table->foreignIdFor(Applicant::class)->constrained()->cascadeOnDelete();
            $table->date("Registered_Date")->default(DB::raw('CURRENT_DATE'));
            $table->string("passenger_token", 36)->unique()->index();
            $table->enum("status", ["Active", "Expired", "Suspended", "Canceled"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passengers');
    }
};
