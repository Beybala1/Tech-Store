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
        Schema::create('alt_sub_category_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alt_sub_category_id')
                ->constrained('alt_sub_categories')
                ->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->string('locale')->index();
            $table->unique(['alt_sub_category_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alt_sub_category_translations');
    }
};
