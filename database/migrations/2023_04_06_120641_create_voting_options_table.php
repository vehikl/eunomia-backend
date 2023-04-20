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
        Schema::create('voting_options', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->bigInteger('voting_session_id')->nullable(false);
            $table->foreign('voting_session_id')->references('id')->on('voting_sessions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voting_options');
    }
};
