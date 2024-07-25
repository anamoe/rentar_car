<?php

use App\Models\PaketRental;
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
        Schema::create('paket_rentals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->string('jenis_paket');
            $table->string('destinasi');
            $table->string('harga');
            $table->string('foto');
            $table->timestamps();
        });
        PaketRental::create([
            'nama_paket' =>'Paket Wisata 7 malam',
            'jenis_paket'=>'wisata',
            'destinasi'=>'Kawah ijen Banyuwnagi',
            'harga'=>'500000',
            'foto'=>'wisata.jpeg'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_rentals');
    }
};
