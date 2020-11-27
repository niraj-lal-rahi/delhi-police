<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseTypeDataGridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_type_data_grids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_types_id');
            $table->unsignedBigInteger('case_type_parents');
            $table->string('case_number',500);
            $table->string('fir_number')->nullable();
            $table->string('party_name',500);
            $table->string('police_station')->nullable();
            $table->string('last_hearing_date');
            $table->string('nxt_hearing_date');
            $table->string('judge',500);
            $table->string('court_district');
            $table->timestamps();
            $table->foreign('case_types_id')->references('id')->on('case_types');
            $table->foreign('case_type_parents')->references('id')->on('case_type_parents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_type_data_grids');
    }
}
