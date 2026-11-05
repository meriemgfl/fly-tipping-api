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
        Schema::create('incidents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('ward_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('category_id')->constrained();
            $table->string('reference_number')->unique();
            $table->string('product')->default('Fly-tipping');
            $table->boolean('is_public')->default(true);
            $table->datetime('reported_at');
            $table->decimal('easting', 14, 8);
            $table->decimal('northing', 14, 8);
            $table->timestamps();

            $table->index('reported_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
