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
        Schema::create('transaksi_rentals', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->string('status_bayar');
            $table->string('status_pengantaran');
            $table->integer('customer_id')->nullable();
            $table->integer('driver_id')->nullable();
            $table->integer('mobil_id')->nullable();
            $table->integer('paket_id')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_rentals');
    }
};
