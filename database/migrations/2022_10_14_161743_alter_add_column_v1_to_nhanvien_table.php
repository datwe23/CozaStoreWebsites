<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cusc_nhanvien', function (Blueprint $table) {
            $table->string('nv_ghinhodangnhap')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cusc_nhanvien', function (Blueprint $table) {
            $table->string('nv_ghinhodangnhap');
        });
    }
};
