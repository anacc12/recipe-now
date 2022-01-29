<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->connection)->create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyInteger('numOfPeople');
            $table->integer('cookTime');
            $table->string('difficultyName');
            $table->text('ingredients');
            $table->text('instructions');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)->dropIfExists('recipes');
    }
}
