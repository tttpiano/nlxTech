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
        Schema::create('image_related', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('img_id');
            $table->unsignedBigInteger("related_id");
            $table->text("entity");
            $table->timestamps();


            $table->foreign('img_id')
                ->references('id')
                ->on('image')
                ->onDelete('restrict');

            $table->foreign('related_id')
                ->references('id')
                ->on('product')
                ->onDelete('restrict');

            $table->foreign('related_id')
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
        Schema::dropIfExists('image_related');
    }
};
