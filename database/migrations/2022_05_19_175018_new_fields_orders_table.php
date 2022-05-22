<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewFieldsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_factura', function (Blueprint $table) {
            $table->dropForeign(['id_producto']);
            $table->foreign('id_producto')->references('id-_producto')->on('productos')->onDelete('cascade')->change();
            $table->dropForeign(['id_factura']);
            $table->foreign('id_factura')->references('id-_factura')->on('facturas')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_factura', function (Blueprint $table) {
            //
        });
    }
}