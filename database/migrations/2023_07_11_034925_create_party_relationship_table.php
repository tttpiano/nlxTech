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
        Schema::create('party_relationship', function (Blueprint $table) {
            $table->unsignedBigInteger("party_id");
            $table->unsignedBigInteger("child_id");
            $table->string("party_type");
            $table->string("child_type");
            $table->string("entity_child");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('party_relationship');
    }
};
