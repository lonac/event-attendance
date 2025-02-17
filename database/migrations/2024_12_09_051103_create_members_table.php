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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->boolean('attend')->default(0);
            $table->string('phone_number')->nullable();
            $table->unsignedBigInteger('zone_id')->nullable(); 
            $table->unsignedBigInteger('marital_status')->nullable(); 
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('set null');
            $table->foreign('marital_status')->references('id')->on('marital_statuses')->onDelete('set null');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
