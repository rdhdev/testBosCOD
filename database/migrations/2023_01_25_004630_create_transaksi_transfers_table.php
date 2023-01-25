<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_transfers', function (Blueprint $table) {
            $table->string('id', 100)->unique();
            $table->foreignId('bank_pengirim');
            $table->foreignId('bank_penerima');
            $table->foreignId('rekening_admin_id');
            $table->string('nama_tujuan', 50);
            $table->string('nilai_transfer', 100);
            $table->integer('kode_unik');
            $table->timestamp('expired');
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
        Schema::dropIfExists('transaksi_transfers');
    }
}
