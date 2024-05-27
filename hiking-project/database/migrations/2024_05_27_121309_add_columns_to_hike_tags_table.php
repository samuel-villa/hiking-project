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
        Schema::table('hikes__tags', function (Blueprint $table) {
            $table->foreignId('hike_id')->constrained('hikes')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('hikes__tags', function (Blueprint $table) {
            $table->dropForeign(['hike_id']);
            $table->dropColumn('hike_id');
            $table->dropForeign(['tag_id']);
            $table->dropColumn('tag_id');
        });
    }
};
