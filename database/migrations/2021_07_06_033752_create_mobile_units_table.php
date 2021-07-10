<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobileUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_unit', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_donor');
            $table->string('lokasi_donor', 50);
            $table->string('waktu_mulai', 45);
            $table->string('waktu_selesai', 45);
            $table->string('deskripsi', 100);
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
        Schema::dropIfExists('mobile_unit');
    }
}
