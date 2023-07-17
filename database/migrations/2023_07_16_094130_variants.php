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
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });
        Schema::create('variant_values', function (Blueprint $table) {
            $table->id();
            $table->string("value");
            $table->unsignedBigInteger("variant_id");
            $table->timestamps();

            $table->foreign("variant_id")
                  ->references("id")
                  ->on("variants");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
