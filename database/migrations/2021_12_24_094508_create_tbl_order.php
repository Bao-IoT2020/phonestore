<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->increments('id')->comment('Mã đơn hàng');
            $table->integer('customer_id')->comment('Mã khách hàng');
            $table->integer('shipping_id')->comment('Mã vận chuyển');
            $table->string('total')->comment('Tổng tiền đơn hàng');
            $table->integer('status')->comment('Trạng thái đơn hàng');
            $table->string('reason_cancel')->comment('Lý do hủy đơn hàng')->nullable();
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
        Schema::dropIfExists('tbl_order');
    }
}
