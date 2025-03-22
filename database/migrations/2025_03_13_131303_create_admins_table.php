<?php

use App\Models\AdminRole;
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
        Schema::create('admins', function (Blueprint $table) {
            $table->id()->from(1000);
            $table->foreignIdFor(Station::class)->nullable()->constrained()->nullOnDelete();
            $table->string("Full_Name");
            $table->foreignIdFor(AdminRole::class)->constrained();
            $table->string("email")->unique();
            $table->string("Password");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
