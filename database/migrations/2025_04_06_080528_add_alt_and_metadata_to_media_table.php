<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('media', function (Blueprint $table) {
            $table->string('alt')->nullable()->after('responsive_images');
            $table->string('title')->nullable()->after('alt');
            $table->text('caption')->nullable()->after('title');
            $table->text('description')->nullable()->after('caption');
        });
    }

    public function down(): void
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropColumn(['alt', 'title', 'caption', 'description']);
        });
    }
};
