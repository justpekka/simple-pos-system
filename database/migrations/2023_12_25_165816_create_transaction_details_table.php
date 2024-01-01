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
            $table->uuid("uuid")->unique();

            $table->string("transaction_uuid")->nullable();
            $table->string("unit_uuid")->nullable();
            $table->string("product_uuid")->nullable();
            $table->foreign("transaction_uuid")->references("uuid")->on("transactions")->onDelete("SET NULL");
            $table->foreign("unit_uuid")->references("uuid")->on("units")->onDelete("SET NULL");
            $table->foreign("product_uuid")->references("uuid")->on("products")->onDelete("SET NULL");
            
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
