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
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // id() uses bigInteger
            
            // Constraint: delete comments if referenced post is deleted
            $table->foreignId('post_id')->constrained()->cascadeOnDelete(); // This is same as
            // $table->unsignedBigInteger('post_id');
            // $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
            
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // $table->unsignedBigInteger('user_id');

            $table->text('body');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
