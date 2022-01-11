<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_admin', function (Blueprint $table) {
            $table->id()->comment("Mã admin");
            $table->string('name')->comment("Tên admin");
            $table->string('email')->comment("Email admin")->unique();
            $table->string('password')->comment("người dùng password");
            $table->string('phone_number',13)->comment("SĐT admin");
            $table->timestamps();
        });
        $user = Admin::create([
            'name' => 'Bao',
            'email' => 'admin@gmail.com',
            'password' => '123456789',
            'phone_number' => '084123456789',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_admin');
    }
}
