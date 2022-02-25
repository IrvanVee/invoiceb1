<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->nullable();
            // $table->foreign('quotation_id')->references('id')->on('quotation')->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->integer('vendor_id')->nullable();
            $table->integer('product_id');
            $table->integer('quantity');
            $table->integer('sum_product');
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
        Schema::dropIfExists('detail_invoices');
    }
}
