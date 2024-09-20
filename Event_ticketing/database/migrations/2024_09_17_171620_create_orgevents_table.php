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
        Schema::create('orgevents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            //$table->string('location');
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            $table->integer('ticket_price')->default(0);
            $table->integer('total_tickets')->default(0);
            $table->integer('tickets_sold')->default(0);
            $table->foreignId('event_id')->constrained();
            $table->foreignId('organizer_id')->constrained('users')->onDelete('cascade'); // Organizer reference
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orgevents');
    }
};
