<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('animalid');
            $table->string('animalname');
            $table->string('animaldescription');
            $table->string('surveyanswer','1000');
            $table->boolean('status')->nullable();
            $table->foreign('userid')->references('id')->on("users")->cascadeOnDelete();
            $table->foreign('animalid')->references('id')->on("animals")->cascadeOnDelete();
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
        Schema::dropIfExists('requests');
    }
}
