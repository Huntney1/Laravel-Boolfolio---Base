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
        //! Definisco i campi della tabella
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('title', 40)->unique();
            $table->paragraph('description');
            $table->string('slug');
            $table->string('category')->nullable();
            $table->binary('image')->nullable();
            $table->dateTime('published')->nullable();

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
       /*  schema::table('project', function(Blueprint $table){
            $table->dropColumn('image');
        }); */
        Schema::dropIfExists('porojects');
    }
};
