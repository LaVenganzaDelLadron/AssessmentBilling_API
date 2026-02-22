<?php

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
        Schema::create('assessment', function (Blueprint $table) {
            $table->string('assessment_id')->primary();
            $table->string('customer_id');
            $table->float('total_amount');
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->date('assessment_date')->useCurrent();
            $table->date('created_at')->useCurrent();

            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment');
    }
};
