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
        Schema::create('video_links', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('product_url');
            $table->string('image');
            $table->string('extension');
            $table->text('content');
            $table->text('keywords')->nullable();
            $table->string('status')->default('Active');
            $table->bigInteger('unique_count')->default(0);
            $table->bigInteger('total_click')->default(0);
            $table->integer('serial');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_links');
    }
};
