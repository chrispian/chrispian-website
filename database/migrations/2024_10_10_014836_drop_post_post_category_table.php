<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropPostPostCategoryTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('post_post_category');
    }

    public function down()
    {
        Schema::create('post_post_category', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }
}
