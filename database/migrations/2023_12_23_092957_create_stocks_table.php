<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid("uuid")->unique();
            $table->string("product_uuid")->nullable();
            $table->foreign("product_uuid")->references("uuid")->on("products")->onDelete("SET NULL");
            $table->string("unit_uuid")->nullable();
            $table->foreign("unit_uuid")->references("uuid")->on("units")->onDelete("SET NULL");
            $table->integer("amount");
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
        Schema::dropIfExists('stocks');
    }
}
