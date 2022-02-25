<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->integer("vendor_id");
            $table->integer("customer_id");
            $table->integer("refrensi");
            $table->date("duedate");
            $table->integer("discount_id");
            $table->integer("tax_id");
            $table->integer("pengiriman");
            $table->integer("dibayar")->nullable();
            $table->integer("total");
            $table->integer("tunggakan")->nullable();
            $table->string("status");
            $table->longText("note");
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
        Schema::dropIfExists('invoice');
    }
}
