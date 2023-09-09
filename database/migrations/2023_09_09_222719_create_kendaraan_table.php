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
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('photo_name')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('name'); // Menghapus nullable() agar kolom ini tidak dapat bernilai null
            $table->string('jeniskendaraan'); // Menghapus nullable() agar kolom ini tidak dapat bernilai null
            $table->integer('jumlahunit'); // Mengubah tipe data ke integer, dan menghapus nullable()
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
        Schema::dropIfExists('kendaraan');
    }
}
