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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->nullable();

            $table->string('prize_name')->nullable();
            $table->integer('prize_value')->nullable();

            $table->integer('ticket_price')->default(0);
            $table->integer('max_entries')->nullable();

            $table->dateTime('draw_date')->nullable();

            $table->string('status')->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_competitions');
    }
};
