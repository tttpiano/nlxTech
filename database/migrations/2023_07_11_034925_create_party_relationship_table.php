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
            $table->id();
            $table->unsignedBigInteger("party_id");
            $table->unsignedBigInteger("child_id");
            $table->text("party_type");
            $table->text("child_type");
            $table->text("entity_child");
            $table->timestamps();
            $table->foreign('party_id')
                ->references('id')
                ->on('party')
                ->onDelete('restrict');

            $table->foreign('child_id')
                ->references('id')
                ->on('product')
                ->onDelete('restrict');

            $table->foreign('child_id')
                ->references('id')
                ->on('post')
                ->onDelete('restrict');

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
