<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('list_id')->index()->constrained('lists')->cascadeOnDelete();
            $table->foreignUlid('category_id')->index()->constrained('categories')->nullOnDelete();

            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('list_id')->index()->constrained('lists')->onDelete('cascade');

            $table->string('name');

            $table->timestamps();
        });

        Schema::table('lists', function (Blueprint $table) {
            $table->boolean('has_categories')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
        Schema::dropIfExists('categories');
        Schema::table('lists', function (Blueprint $table) {
            $table->dropColumn('has_categories');
        });
    }
};