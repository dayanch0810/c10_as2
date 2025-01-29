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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('league_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignId('club_id_1')->index()->constrained('clubs')->cascadeOnDelete();
            $table->foreignId('club_id_2')->index()->constrained('clubs')->cascadeOnDelete();
            $table->dateTime('match_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
