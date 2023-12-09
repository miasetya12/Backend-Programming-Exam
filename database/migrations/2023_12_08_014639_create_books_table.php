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
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('book_id')->unique();
            $table->string('book_name');

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')->references('author_id')->on('authors')->onDelete('cascade')->onUpdate('cascade');


            // $table->bigIncrements('author_id')->index('author_id');
            // $table->foreignId('category_id')->constrained();
            // $table->foreignId('author_id')->constrained();
            $table->decimal('average_rating')->nullable();
            $table->integer('voter')->nullable();
            $table->timestamps();

            // $table->foreign('category_id')
            // ->references('category_id')
            // ->on('categories')
            // ->onDelete('cascade')
            // ->onUpdate('cascade');

            // $table->foreign('author_id')
            // ->references('author_id')
            // ->on('authors')
            // ->onDelete('cascade')
            // ->onUpdate('cascade');

        });

        // Schema::table('books', function (Blueprint $table) {
        //     $table->bigIncrements('author_id');
        //     $table->bigIncrements('category_id');

        //     $table->foreign('author_id')->references('author_id')->on('authors')->onDelete('cascade')->onUpdate('cascade');
        //     $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
