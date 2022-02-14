<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            // Primary Key
            $table->id();
            
            // New Columns
            $table->string('name');       // Recipe Name
            $table->text('image');        // Image Path
            $table->text('description');  // Recipe Description
            $table->text('ingredients');  // Recipe Ingredients
            $table->string('category')->nullable();  // Nullable category

            // Default Timestamp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
