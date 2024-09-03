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
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });
        PaketRental::create([
            'nama_paket' =>'Paket Wisata 1',
            'jenis_paket'=>'wisata',
            'destinasi'=>'Kawah ijen Banyuwnagi',
            'harga'=>'500000',
            'foto'=>'wisata.jpeg'
        ]);
        PaketRental::create([
            'nama_paket' =>'Paket Wisata 2',
            'jenis_paket'=>'wisata',
            'destinasi'=>'Teluk Biru Banyuwangi',
            'harga'=>'600000',
            'foto'=>'wisata2.jpeg'
        ]);
        PaketRental::create([
            'nama_paket' =>'Paket Wisata 3',
            'jenis_paket'=>'wisata',
            'destinasi'=>'Teluk Hijau Banyuwangi',
            'harga'=>'700000',
            'foto'=>'wisata3.jpeg'
        ]);
        PaketRental::create([
            'nama_paket' =>'Paket Wisata 4',
            'jenis_paket'=>'wisata',
            'destinasi'=>'Pulau Merah Banyuwangi',
            'harga'=>'800000',
            'foto'=>'wisata4.jpg'
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
