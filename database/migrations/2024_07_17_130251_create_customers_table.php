<?php

use App\Models\Customer;
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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('umur');
            $table->string('foto')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Customer::create([
            'user_id'=>4,
            'name'=>'Customerku',
            'address'=>'banyuwangi',
            'umur'=>'20'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
