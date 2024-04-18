<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('todo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name'); //I added the name column
            $table->text('description'); //I added the description column
        });
    }
    
public function down()
    {
        Schema::dropIfExists('todo');
    }
};
