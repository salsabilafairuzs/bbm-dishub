<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->integer('jenis_id');
            $table->string('no_pol');
            $table->enum('jenis_bbm',['Dexlite','Pertamax'])->default('Dexlite');
            $table->string('nama_pemohon');
            $table->string('no_seri_kupon');
            $table->date('tanggal');
            $table->integer('jumlah_liter');
            $table->integer('jumlah_nominal');
            $table->text('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
