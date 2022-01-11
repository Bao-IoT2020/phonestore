<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer', function (Blueprint $table) {
            $table->increments('id')->comment("Mã người dùng");
            $table->string('name')->comment("Tên người dùng");
            $table->string('email')->comment("Email người dùng");
            $table->string('phone')->comment("Số điện thoại người dùng");
            $table->string('password')->comment("Mật khẩu người dùng");
            $table->string('token')->comment('Mã token')->nullable();
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
        Schema::dropIfExists('tbl_customer');
    }
}
