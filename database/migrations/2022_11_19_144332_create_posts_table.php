<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('sort_order')->nullable();;
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();            $table->string('title');
            $table->string('slug');
            $table->text('cover_image')->nullable();
            $table->text('summary')->nullable();
            $table->json('content');
            $table->string('status')->default('draft');
            $table->foreignId('project_id')->nullable();
            $table->foreignId('series_id')->nullable();
            $table->json('related_posts')->nullable();
            $table->string('wordpress_slug')->nullable();
            $table->integer('wordpress_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
