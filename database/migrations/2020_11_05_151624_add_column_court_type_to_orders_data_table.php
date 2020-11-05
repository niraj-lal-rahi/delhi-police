<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCourtTypeToOrdersDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders_data', function (Blueprint $table) {
            //
            $table->string('filename')->after('site_id');
            $table->string('court_type')->after('site_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders_data', function (Blueprint $table) {
            //
            $table->dropColumn('filename');
            $table->dropColumn('court_type');
        });
    }
}
