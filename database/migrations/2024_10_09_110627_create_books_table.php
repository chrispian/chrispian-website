<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_id')->unique();
            $table->string('title');
            $table->string('author');
            $table->string('author_lf')->nullable();
            $table->string('additional_authors')->nullable();
            $table->string('isbn')->nullable();
            $table->string('isbn13')->nullable();
            $table->float('rating')->nullable();
            $table->float('average_rating')->nullable();
            $table->string('publisher')->nullable();
            $table->string('binding')->nullable();
            $table->integer('pages')->nullable();
            $table->integer('published_year')->nullable();
            $table->integer('original_publication_year')->nullable();
            $table->date('date_read')->nullable();
            $table->date('date_added')->nullable();
            $table->string('categories')->nullable();
            $table->string('bookshelves_with_positions')->nullable();
            $table->enum('status', ['read', 'unread', 'reading'])->nullable()->default('unread');
            $table->text('review')->nullable();
            $table->boolean('spoiler')->default(false);
            $table->text('private_notes')->nullable();
            $table->integer('read_count')->nullable();
            $table->integer('owned_copies')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}
