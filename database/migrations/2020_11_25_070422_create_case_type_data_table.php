<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseTypeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_type_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_types_id');
            $table->integer('parent_id');
            $table->enum('level',['0','1','2'])->default('0');
            $table->longText('data')->nullable();
            $table->timestamps();
            $table->foreign('case_types_id')->references('id')->on('case_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_type_data');
    }
}
