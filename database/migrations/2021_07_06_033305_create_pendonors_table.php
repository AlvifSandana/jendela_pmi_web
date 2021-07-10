<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendonor', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pendonor', 50);
            $table->string('email', 50)->unique();
            $table->string('password', 191);
            $table->string('alamat', 50);
            $table->string('telepon', 12);
            $table->string('status', 45);
            $table->string('photo', 45);
            $table->string('api_token', 191);
            $table->string('remember_token', 100);
            $table->foreignId('roles_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('pendonor');
    }
}
