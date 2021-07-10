<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifikasiWaktuDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasi_waktu_donor', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_darah', 20);
            $table->dateTime('waktu_donor');
            $table->foreignId('pendonor_id')->constrained('pendonor')->onDelete('cascade');
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
        Schema::dropIfExists('notifikasi_waktu_donor');
    }
}
