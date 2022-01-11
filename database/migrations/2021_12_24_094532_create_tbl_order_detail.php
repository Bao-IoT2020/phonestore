<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_detail', function (Blueprint $table) {
            $table->foreignId('order_id')->comment('Mã đơn hàng');
            $table->foreignId('product_id')->comment('Mã sản phẩm');
            $table->integer('quantity')->comment('Số lượng sản phẩm');
            $table->string('price')->comment('Giá gốc');
            $table->string('sale_price')->nullable()->comment('Giá khuyến mãi');
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
        Schema::dropIfExists('tbl_order_detail');
    }
}
