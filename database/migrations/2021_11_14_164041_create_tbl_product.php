<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->comment("Mã thương hiệu");
            // $table->integer('category_id')->comment("Mã danh mục");
            $table->string('name')->comment("Tên sản phẩm");
            $table->text('description')->comment("Mô tả sản phẩm");
            $table->string('image')->comment("Hình ảnh sản phẩm");
            $table->string('price')->comment("Giá sản phẩm");
            $table->string('sale_price')->nullable()->comment("Giá khuyến mãi");
            $table->string('rom')->comment("Bộ nhớ trong");
            $table->string('ram')->comment("Dung lượng ram");
            $table->string('battery')->comment("Dung lượng pin");
            $table->string('screen')->comment("Công nghệ màn hình");
            $table->string('front_camera')->comment("Thông số cam trước");
            $table->string('rear_camera')->comment("Thông số cam sau");
            $table->string('chipset')->comment("Loại chip");
            $table->integer('status')->comment("Trạng thái sản phẩm");
            $table->timestamps();

            $table->foreign('brand_id')->comment('Mã thương hiệu')->references('id')->on('tbl_brand')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product');
    }
}
