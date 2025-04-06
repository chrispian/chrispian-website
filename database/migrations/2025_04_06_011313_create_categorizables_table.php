<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categorizables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->morphs('categorizable'); // creates `categorizable_id` and `categorizable_type` indexed
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categorizables');
    }
};
