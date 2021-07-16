<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGolonganDarahTtlColumnTablePendonor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendonor', function (Blueprint $table) {
            $table->string('ttl')->after('telepon');
            $table->string('golongan_darah')->after('ttl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendonor', function (Blueprint $table) {
            $table->dropColumn('ttl');
            $table->dropColumn('golongan_darah');
        });
    }
}
