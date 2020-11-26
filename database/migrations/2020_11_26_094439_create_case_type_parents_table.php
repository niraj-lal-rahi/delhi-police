<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseTypeParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_type_parents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_types_id');
            $table->string("s_no");
            $table->string('case_type',500);
            $table->string('petitioner_name');
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
        Schema::dropIfExists('case_type_parents');
    }
}
