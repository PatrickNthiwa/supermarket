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
        Schema::table('managers', function (Blueprint $table) {
            $table->unsignedBigInteger('supermarket_id')->nullable();
            $table->foreign('supermarket_id')->references('id')->on('supermarkets')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('managers', function (Blueprint $table) {
            $table->dropForeign(['supermarket_id']);
            $table->dropColumn('supermarket_id');
        });
    }
};
