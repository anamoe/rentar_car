<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\TransaksiRental;
use App\Models\User;
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
            ->where('transaksi_rentals.driver_id', auth()->user()->id)->where('status_bayar', 'terbayar')->get();
        return view('driver.transaksi_rental', compact('data'));
    }

    public function selesai(Request $request, $id_transaksi)
    {

        $id = TransaksiRental::where('id', $id_transaksi)->first();
        $id->update([
            'status_pengantaran' => 'selesai'
        ]);

        User::where('id',$id->driver_id)->update([
            'status_driver'=>'free'
        ]);

        Mobil::where('id',$id->mobil_id)->update([
            'status_mobil'=>'free'
        ]);

        return redirect('driver/laporan-kerusakan/' . $id->mobil_id)
            ->with('success', 'Berhasil,Silahkan Isi laporan Kerusakan');
    }

    public function create_laporan($id)
    {
        $mobil = Mobil::where('id',$id)->first();
        return view('driver.create-laporan-kerusakan',compact('mobil'));
    }
}
