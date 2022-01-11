<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblShipping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shipping', function (Blueprint $table) {
            $table->increments('id')->comment("Mã giao hàng");
            $table->string('name')->comment("Tên người nhận");
            $table->string('email')->comment("Email người nhận");
            $table->string('phone')->comment("Số điện thoại người nhận");
            $table->text('note')->comment("Ghi chú đơn hàng")->nullable();
            $table->string('address')->comment("Địa chỉ giao hàng");
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
        Schema::dropIfExists('tbl_shipping');
    }
}
