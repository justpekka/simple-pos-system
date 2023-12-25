<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid("uuid");
            $table->unsignedBigInteger("transaction_id");
            $table->unsignedBigInteger("unit_id");
            $table->unsignedBigInteger("product_id");
            $table->foreign("transaction_id")->references("id")->on("transactions");
            $table->foreign("unit_id")->references("id")->on("units");
            $table->foreign("product_id")->references("id")->on("products");
            $table->integer("amount");
            $table->integer("total");
            $table->integer("discount");
            $table->integer("total_discount");
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
        Schema::dropIfExists('transaction_details');
    }
}
