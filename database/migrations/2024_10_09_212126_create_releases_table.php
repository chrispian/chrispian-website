<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReleasesTable extends Migration
{
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('discogs_id')->unique();
            $table->string('title');
            $table->integer('year')->nullable();
            $table->string('resource_url')->nullable();
            $table->string('thumb')->nullable();
            $table->string('cover_image')->nullable();
            $table->json('formats')->nullable();
            $table->json('labels')->nullable();
            $table->json('artists')->nullable();
            $table->json('genres')->nullable();
            $table->json('styles')->nullable();
            $table->integer('rating')->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('releases');
    }
}
