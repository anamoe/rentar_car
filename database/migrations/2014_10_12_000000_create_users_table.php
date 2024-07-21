<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('role');
            $table->string('password');
            $table->string('photo_ktp')->nullable();
            $table->string('photo_sim')->nullable();
            $table->string('status_driver')->nullable();
            $table->timestamps();
        });

        User::create([
            'username'=>'admin',
            'name'=>'adminku',
            'email'=>'admin@gmail.com',
            'phone'=>'98138919301',
            'role'=>'admin',
            'password'=>bcrypt(123)
        ]);
        User::create([
            'name'=>'ownerku',
            'username'=>'owner',
            'email'=>'owner@gmail.com',
            'phone'=>'98138919301',
            'role'=>'owner',
            'password'=>bcrypt(123)

        ]);
        User::create([
            'name'=>'driverku',
            'username'=>'driver',
            'email'=>'driver@gmail.com',
            'phone'=>'98138919301',
            'role'=>'driver',
            'password'=>bcrypt(123)

        ]);
        User::create([
            'name'=>'cutsomerku',
            'username'=>'customer',
            'email'=>'customer@gmail.com',
            'phone'=>'98138919301',
            'role'=>'customer',
            'password'=>bcrypt(123)

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
