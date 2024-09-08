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
            $table->string('biaya_fasilitas');
            $table->string('foto');
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });
        PaketRental::create([
            'nama_paket' =>'Paket Wisata 1',
            'jenis_paket'=>'wisata',
            'destinasi'=>'Kawah ijen Banyuwnagi',
            'harga'=>'500000',
            'biaya_fasilitas'=>'50000',
            'foto'=>'wisata.jpeg',
            'deskripsi'=>'Teluk Hijau, atau dikenal juga sebagai Green Bay, adalah salah satu destinasi wisata alam yang terletak di Taman Nasional Meru Betiri, Banyuwangi, Jawa Timur. Teluk ini terkenal karena keindahan alamnya yang masih asri dan tersembunyi, serta perairannya yang berwarna hijau jernih, yang memberikan kesan unik dan memukau.'
        ]);
        PaketRental::create([
            'nama_paket' =>'Paket Wisata 2',
            'jenis_paket'=>'wisata',
            'destinasi'=>'Teluk Biru Banyuwangi',
            'harga'=>'600000',
            'foto'=>'wisata2.jpeg',
            'biaya_fasilitas'=>'50000',
            'deskripsi'=>'Teluk Hijau, atau dikenal juga sebagai Green Bay, adalah salah satu destinasi wisata alam yang terletak di Taman Nasional Meru Betiri, Banyuwangi, Jawa Timur. Teluk ini terkenal karena keindahan alamnya yang masih asri dan tersembunyi, serta perairannya yang berwarna hijau jernih, yang memberikan kesan unik dan memukau.'

        ]);
        PaketRental::create([
            'nama_paket' =>'Paket Wisata 3',
            'jenis_paket'=>'wisata',
            'destinasi'=>'Teluk Hijau Banyuwangi',
            'harga'=>'700000',
            'foto'=>'wisata3.jpeg',
            'biaya_fasilitas'=>'50000',
            'deskripsi'=>'Teluk Hijau, atau dikenal juga sebagai Green Bay, adalah salah satu destinasi wisata alam yang terletak di Taman Nasional Meru Betiri, Banyuwangi, Jawa Timur. Teluk ini terkenal karena keindahan alamnya yang masih asri dan tersembunyi, serta perairannya yang berwarna hijau jernih, yang memberikan kesan unik dan memukau.'

        ]);
        PaketRental::create([
            'nama_paket' =>'Paket Wisata 4',
            'jenis_paket'=>'wisata',
            'destinasi'=>'Pulau Merah Banyuwangi',
            'harga'=>'800000',
            'foto'=>'wisata4.jpg',
            'biaya_fasilitas'=>'50000',
            'deskripsi'=>'Teluk Hijau, atau dikenal juga sebagai Green Bay, adalah salah satu destinasi wisata alam yang terletak di Taman Nasional Meru Betiri, Banyuwangi, Jawa Timur. Teluk ini terkenal karena keindahan alamnya yang masih asri dan tersembunyi, serta perairannya yang berwarna hijau jernih, yang memberikan kesan unik dan memukau.'

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
