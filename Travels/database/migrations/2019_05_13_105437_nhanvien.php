<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nhanvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('nhanvien', function (Blueprint $table) {
        //     $table->bigIncrements('MaNV');
        //     $table->string('TenNV');
        //     $table->string('password');
        //     $table->string('Email');
        //     $table->string('Tel');
        //     $table->string('DiaChi');
        //     $table->string('HinhAnh');
        //     $table->tinyInteger('Quyen');
        //     $table->string('PhamViHD');
        //     $table->string('TrinhDo');
        //     $table->string('MaChucVu');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
