<?php

use App\Models\Brand;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_brand', function (Blueprint $table) {
            $table->increments('id')->comment("Mã thương hiệu");
            $table->string('name')->comment("Tên thương hiệu");
            $table->string('description')->comment("Mô tả thương hiệu");
            $table->integer('status')->comment("Trạng thái thương hiệu");
            $table->timestamps();
        });
        $data = [
            ['name'=>'Iphone','description'=>'Đây là iphone.','status'=>'0'],
            ['name'=>'Samsung','description'=>'Đây là samsung.','status'=>'0'],
            ['name'=>'Xiaomi','description'=>'Đây là xiaomi.','status'=>'0']
        ];
        Brand::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_brand');
    }
}
