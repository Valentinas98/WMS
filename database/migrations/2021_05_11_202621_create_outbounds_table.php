<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutboundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outbounds', function (Blueprint $table) {
            $table->increments('id');
            $table->date('outbound_date');
            $table->string('outbound_number');
            $table->string('cargo_manifest_number');
            $table->string('product_number');
            $table->string('product_name');
            $table->integer('product_quantity');
            $table->string('product_sn');
            $table->string('carrier_license_plate');
            $table->string('carrier_person');
            $table->string('loaded_by');
            $table->string('warehouse_id');
            $table->string('info_note')->nullable();
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
        Schema::dropIfExists('outbounds');
    }
}
