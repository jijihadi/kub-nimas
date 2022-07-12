<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('alamat');
            $table->integer('jumlah_anggota');
            $table->string('kelas');
            $table->string('noreg_skt');
            $table->string('noreg_pupi');
            $table->string('id_ketua');
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
        Schema::dropIfExists('kubs');
    }
}
