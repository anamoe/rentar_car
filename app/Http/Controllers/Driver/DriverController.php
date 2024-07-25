<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\TransaksiRental;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    //
    public function transaksi_rental()
    {
        //

        $data = TransaksiRental::join('mobils', 'transaksi_rentals.mobil_id', 'mobils.id')
        ->leftjoin('users as driver', 'transaksi_rentals.driver_id', 'driver.id')
        ->join('users as customer', 'transaksi_rentals.customer_id', 'customer.id')
        ->leftjoin('paket_rentals', 'transaksi_rentals.paket_id', 'paket_rentals.id')
        ->select('driver.name as nama_driver', 'customer.name as nama_customer', 'paket_rentals.*', 'transaksi_rentals.*')
        ->where('transaksi_rentals.driver_id',auth()->user()->id)->where('status_bayar','terbayar')->get();
        return view('driver.transaksi_rental',compact('data'));
    }
}