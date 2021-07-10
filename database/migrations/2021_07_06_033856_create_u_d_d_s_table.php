<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUDDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UDD', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 45);
            $table->string('alamat', 45);
            $table->foreignId('mobile_unit_id')->constrained('mobile_unit')->onDelete('cascade');
            $table->foreignId('stok_darah_id')->constrained('stok_darah')->onDelete('cascade');
            $table->foreignId('informasi_kegiatan_id')->constrained('informasi_kegiatan', 'id_kegiatan')->onDelete('cascade');
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
        Schema::dropIfExists('UDD');
    }
}
