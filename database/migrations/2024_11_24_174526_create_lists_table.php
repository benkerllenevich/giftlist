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
        Schema::create('lists', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->index()->constrained('users')->cascadeOnDelete();

            $table->string('name');
            $table->enum('visibility', ['public', 'invite-only', 'private'])->default('private');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lists');
    }
};
