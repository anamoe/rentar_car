<?php

use App\Models\Mobil;
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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id')->nullable();
            $table->string('merk');
            $table->string('model');
            $table->string('tahun');
            $table->string('foto');
            $table->string('biaya_bbm');
            $table->string('biaya_driver');
            $table->string('biaya_total');
            $table->enum('status_mobil', ['free', 'book'])->default('free');
            $table->timestamps();
        });

        Mobil::create([
            'owner_id'=>2,
            'merk'=>'Avanza',
            'model'=>'ak47',
            'tahun'=>'2020',
            'foto'=>'mobil.jpg',
            'biaya_bbm'=>'100000',
            'biaya_driver'=>'50000',
            'biaya_total'=>'60000',
            'status_mobil'=>'free'
        ]);

        Mobil::create([
            'owner_id'=>2,
            'merk'=>'Brio',
            'model'=>'Jazz',
            'tahun'=>'1998',
            'foto'=>'mobil2.jpg',
            'biaya_bbm'=>'100000',
            'biaya_driver'=>'50000',
            'biaya_total'=>'60000',
            'status_mobil'=>'free'
        ]);
        Mobil::create([
            'owner_id'=>2,
            'merk'=>'Mclaren',
            'model'=>'T121',
            'tahun'=>'2024',
            'foto'=>'mobil3.jpg',
            'biaya_bbm'=>'100000',
            'biaya_driver'=>'50000',
            'biaya_total'=>'200000',
            'status_mobil'=>'free'
        ]);
        Mobil::create([
            'owner_id'=>2,
            'merk'=>'aLPHARD',
            'model'=>'wow',
            'tahun'=>'2023',
            'foto'=>'mobil4.jpg',
            'biaya_bbm'=>'200000',
            'biaya_driver'=>'100000',
            'biaya_total'=>'300000',
            'status_mobil'=>'free'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
