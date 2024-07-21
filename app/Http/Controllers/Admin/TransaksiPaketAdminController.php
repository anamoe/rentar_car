<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransaksiRental;
use Illuminate\Http\Request;

class TransaksiPaketAdminController extends Controller
{
    //
    public function index(){
        $data=TransaksiRental::
        join('mobils','transaksi_rentals.mobil_id','mobils.id')
        ->join('users as driver','transaksi_rentals.driver_id','driver.id')
        ->join('users as customer','transaksi_rentals.mobil_id','customer.id')
        ->join('paket_rentals','transaksi_rentals.paket_id','paket_rentals.id')
        ->select('driver.name as nama_driver','customer.name as nama_customer','paket_rentals.*','transaksi_rentals.*')
        ->orderBy('transaksi_rentals.id','desc')->get();
        // return $data;
        return view('admin.transaksipaket',compact('data'));
    }
}
