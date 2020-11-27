<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseTypeActSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_type_act_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_type_data_grids_id');
            $table->string('act',500);
            $table->string('sections');
            $table->timestamps();
            $table->foreign('case_type_data_grids_id')->references('id')->on('case_type_data_grids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_type_act_sections');
    }
}
