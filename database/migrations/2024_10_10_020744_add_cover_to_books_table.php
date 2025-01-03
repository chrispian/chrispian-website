<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoverToBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('cover')->nullable()->after('isbn');
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('cover');
        });
    }
}
