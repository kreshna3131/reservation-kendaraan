<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Menghapus nullable() agar kolom ini tidak dapat bernilai null
            $table->string('foto');
            $table->string('jenis_kendaraan'); // Menghapus nullable() agar kolom ini tidak dapat bernilai null
            $table->integer('jumlah_unit'); // Mengubah tipe data ke integer, dan menghapus nullable()
            $table->string('harga_sewa'); // Menghapus nullable() agar kolom ini tidak dapat bernilai null
            $table->longText('keterangan'); // Menghapus nullable() agar kolom ini tidak dapat bernilai null
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
        Schema::dropIfExists('tb_kendaraan');
    }
}
