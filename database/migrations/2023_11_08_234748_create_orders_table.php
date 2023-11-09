<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id_order');
            $table->date('date_order');
            // $table->unsignedBigInteger('id_delivery');
            $table->foreignId('id_delivery')->references('id_delivery')->on('deliverys');
            // $table->unsignedBigInteger('id_customer');
            $table->foreignId('id_customer')->references('id_custumer')->on('coustomers');
            // $table->unsignedBigInteger('id_supplier');
            $table->foreignId('id_supplier')->references('id_supplier')->on('suppliers');


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
        Schema::dropIfExists('orders');
    }
};
