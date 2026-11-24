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
        Schema::create('replies', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->longText('content');
            $table->foreignUlid('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignUlid('topic_id')->nullable()->constrained('topics')->nullOnDelete();
            $table->ulid('parent_reply_id')->nullable();
            $table->timestamps();
        });

        Schema::table('replies', function (Blueprint $table) {
            $table->foreign('parent_reply_id')->references('id')->on('replies')->nullOnDelete();
       });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
