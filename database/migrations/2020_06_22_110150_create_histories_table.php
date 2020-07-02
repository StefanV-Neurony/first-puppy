<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->unsignedBigInteger('requestid');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('animalid');
            $table->string('animalname');
            $table->string('requestdate','1000');
            $table->string('adoptiondate','1000');
            $table->boolean('status');
            $table->foreign('requestid')->references('id')->on("requests")->cascadeOnDelete();
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
        Schema::dropIfExists('histories');
    }
}
