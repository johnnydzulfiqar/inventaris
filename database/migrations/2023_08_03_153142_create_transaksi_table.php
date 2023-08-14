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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->foreign('keluar_id')->references('id')->on('keluar')->onDelete('cascade');
            $table->unsignedBigInteger('keluar_id')->nullable();
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');
            $table->boolean('status_barang')->nullable(); // 1 untuk tersedia, 0 untuk tidak tersedia
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
        Schema::dropIfExists('transaksi');
    }
};
