<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation', function (Blueprint $table) {
            $table->id();
            $table->integer('marketing_id');
            $table->integer('customer_id');
            $table->integer('refrensi');
            $table->date('duedate');
            // $table->integer('product_id');
            $table->integer('discount_id');
            $table->integer('tax_id');
            $table->integer('pengiriman');
            $table->integer('total');
            $table->longText('note');
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
        Schema::dropIfExists('quotation');
    }
}
