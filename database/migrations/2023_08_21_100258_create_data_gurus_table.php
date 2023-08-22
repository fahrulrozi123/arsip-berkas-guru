<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nuptk');
            $table->string('ijazah_S1');
            $table->string('ijazah_S2');
            $table->string('ktp');
            $table->string('ijazah_SD');
            $table->string('ijazah_SMA');
            $table->string('ijazah_SMP');
            $table->string('sk_kepsek');
            $table->string('sk_yayasan');
            $table->string('kk');
            $table->string('akte');
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
        Schema::dropIfExists('data_gurus');
    }
}
