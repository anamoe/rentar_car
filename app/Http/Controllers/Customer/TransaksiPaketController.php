<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\TransaksiRental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransaksiPaketController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $randomString = Str::random(6);

        TransaksiRental::create([
            'customer_id'=>auth()->user()->id,
            'paket_id'=>$request->paket_id,
            'mobil_id'=>$request->mobil_id,
            'pembayaran_dp'=>$request->pembayaran_dp,
            'status_bayar'=>'pending',
            'status_pengantarah'=>'belum',
            'kode_transaksi'=> Str::upper($randomString)
        ]);
        Mobil::where('id',$request->id_mobil)->update([
            'status_mobil'=>'book'
        ]);

        User::where('role','driver')->where('id',$request->driver_id)->update([
            'status_driver'=>'book'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
