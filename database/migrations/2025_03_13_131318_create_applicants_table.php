<?php

use App\Models\Admin;
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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id()->from(5000000); // Start IDs from 1000
            $table->string('full_name');
            $table->string('nic')->unique();
            $table->foreignIdFor(Admin::class)->nullable()->constrained();
            $table->enum('gender', ['Male', 'Female']);
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('district');
            $table->string('province');
            $table->string('occupation');
            $table->string('occupation_address');
            $table->enum("occupation_sector", ["GOV", "PVT"]);
            $table->string('home_station');
            $table->string('work_station');
            $table->string('photo');
            $table->string('source_of_proof');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum("status", ["Pending", "Approved"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
