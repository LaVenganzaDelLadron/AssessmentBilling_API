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
        Schema::create('assessment_items', function (Blueprint $table) {
            $table->string('assessment_item_id')->primary();
            $table->string('assessment_id');
            $table->string('description');
            $table->integer('quantity');
            $table->float('unit_price');
            $table->float('amount');
            $table->date('created_at')->useCurrent();

            $table->foreign('assessment_id')->references('assessment_id')->on('assessment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_items');
    }
};
