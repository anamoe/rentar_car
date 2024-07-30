<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransaksiRental;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiPaketAdminController extends Controller
{
    //
    public function index()
    {
        $data = TransaksiRental::join('mobils', 'transaksi_rentals.mobil_id', 'mobils.id')
            ->leftjoin('users as driver', 'transaksi_rentals.driver_id', 'driver.id')
            ->join('users as customer', 'transaksi_rentals.mobil_id', 'customer.id')
            ->leftjoin('paket_rentals', 'transaksi_rentals.paket_id', 'paket_rentals.id')
            ->select('driver.name as nama_driver', 'customer.name as nama_customer','mobils.*', 'paket_rentals.*', 'transaksi_rentals.*')
            ->orderBy('transaksi_rentals.id', 'desc')->get();
        // return $data;
        $driver = User::where('role', 'driver')->where('status_driver', 'free')->get();

        return view('admin.transaksipaket', compact('data', 'driver'));
    }

    public function pilih_driver(Request $request){

        $cekemail= User::where('id',$request->id_driver)->first();
        $token = $this->getRandomString();
     
        // return $cekemail;

        if($cekemail){
            $email= $cekemail->email;

          

            $link = getenv('APP_URL') . "driver/transaksi-paket";
            $name = $cekemail->name;
            $data = [
                'name' => $name,
                'body' => "Kepada Driver : $name. ",
                'link' => "$link"
            ];
     
            Mail::send('email.notif-driver', $data, function ($message) use ($name, $email) {
     
       
                $message->to($email, $name)->subject('Pemberitahuan RAHMANA RENTAL CAR');
            });
            return redirect()->back()
            ->with('message', 'Berhasil mengirim pesan ke driver :'.$cekemail->name);

        }else{

            return redirect()->back()
            ->with('error', 'gagal');

        }
        
    }
}
