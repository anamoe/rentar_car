<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\PaketRental;
use App\Models\TransaksiRental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TransaksiPaketAdminController extends Controller
{
    //
    public function index()
    {
        $data = TransaksiRental::join('mobils', 'transaksi_rentals.mobil_id', 'mobils.id')
            ->leftjoin('users as driver', 'transaksi_rentals.driver_id', 'driver.id')
            ->join('users as customer', 'transaksi_rentals.mobil_id', 'customer.id')
            ->leftjoin('paket_rentals', 'transaksi_rentals.paket_id', 'paket_rentals.id')
            ->select('driver.name as nama_driver', 'customer.name as nama_customer', 'mobils.*', 'paket_rentals.*', 'transaksi_rentals.*')
            ->orderBy('transaksi_rentals.id', 'desc')->get();
        // return $data;
        $driver = User::where('role', 'driver')->where('status_driver', 'free')->get();

        return view('admin.transaksipaket', compact('data', 'driver'));
    }
    public function index_selesai()
    {
        $data = TransaksiRental::join('mobils', 'transaksi_rentals.mobil_id', 'mobils.id')
            ->leftjoin('users as driver', 'transaksi_rentals.driver_id', 'driver.id')
            ->join('users as customer', 'transaksi_rentals.mobil_id', 'customer.id')
            ->leftjoin('paket_rentals', 'transaksi_rentals.paket_id', 'paket_rentals.id')
            ->where('status_bayar', 'selesai')
            ->select('driver.name as nama_driver', 'customer.name as nama_customer', 'mobils.*', 'paket_rentals.*', 'transaksi_rentals.*')
            ->orderBy('transaksi_rentals.id', 'desc')->get();
        // return $data;
        $driver = User::where('role', 'driver')->where('status_driver', 'free')->get();

        return view('admin.transaksipaket_selesai', compact('data', 'driver'));
    }

    public function pilih_driver(Request $request, $id_transaksi)
    {


        // return $cekemail;
        $trans = TransaksiRental::where('id', $id_transaksi)->first();
        $customer = User::where('id',$trans->customer_id)->first();
        $paket = PaketRental::where('id', $trans->paket_id)->first();
        $mobil = Mobil::where('id', $trans->mobil_id)->first();

        $trans->update([
            'driver_id' => $request->driver_id
        ]);
        $cekemail = User::where('id', $request->driver_id)->where('role', 'driver')->orderBy('id', 'desc')->first();
        $cekemail->update([
            'status_driver' => $request->status
        ]);

        //   return $cekemail;



        if ($cekemail) {
            $email = $cekemail->email;



            $link = getenv('APP_URL') . "driver/transaksi-paket";
            $name = $cekemail->name;
            $data = [
                'name' => $name,
                'body' => "Kepada Driver : $name. Ada Orderan. Silahkan cek diwebsite",
                'kp' => $trans->kode_pembayaran,
                'kt' => $trans->kode_transaksi,
                'np' => $paket->nama_paket,
                'd' => $paket->destinasi,
                'mobil' => $mobil->merk,
                'link' => "$link"
            ];

            Mail::send('email.notif-driver', $data, function ($message) use ($name, $email) {


                $message->to($email, $name)->subject('Pemberitahuan RAHMANA RENTAL CAR');
                
            });

            $email2 = $customer->email;

            $link = getenv('APP_URL') . "driver/transaksi-paket";
            $name2 = $customer->name;
            $data = [
                'name' => $name2,
                'body' => "Kepada Customer : $name2. Pesan Transaksi yang di booking",
                'kp' => $trans->kode_pembayaran,
                'kt' => $trans->kode_transaksi,
                'np' => $paket->nama_paket,
                'd' => $paket->destinasi,
                'mobil' => $mobil->merk,
                'link' => "$link"
            ];

            Mail::send('email.notif-driver', $data, function ($message) use ($name2, $email2) {


                $message->to($email2, $name2)->subject('Pemberitahuan RAHMANA RENTAL CAR');
                
            });


            return redirect()->back()
                ->with('success', 'Berhasil mengirim pesan ke driver dan customer');
        } else {

            return redirect()->back()
                ->with('error', 'gagal');
        }
    }

    public function notifkedua($id_transaksi)
    {
        $trans = TransaksiRental::where('id', $id_transaksi)->first();
        $paket = PaketRental::where('id', $trans->paket_id)->first();
        $mobil = Mobil::where('id', $trans->mobil_id)->first();
        $cekemail = User::where('id', $trans->driver_id)->first();
   


        if ($cekemail) {
            $email = $cekemail->email;



            $link = getenv('APP_URL') . "driver/transaksi-paket";
            $name = $cekemail->name;
            $data = [
                'name' => $name,
                'body' => "Kepada Driver : $name. Pemberitahuan Hari ini Melakukan Penjemputan Customer dengan
                data berikut :",
                'kp' => $trans->kode_pembayaran,
                'kt' => $trans->kode_transaksi,
                'np' => $paket->nama_paket ?? '',
                'd' => $paket->destinasi??'',
                'mobil' => $mobil->merk,
                'ap' => $trans->alamat_penjemputan,
                'link' => "$link"
            ];

            Mail::send('email.notif-driver', $data, function ($message) use ($name, $email) {


                $message->to($email, $name)->subject('Pemberitahuan RAHMANA RENTAL CAR');
                
            });


            return redirect()->back()
                ->with('success', 'Berhasil mengirim notifikasi hari H ke driver ');
        } else {

            return redirect()->back()
                ->with('error', 'gagal');
        }
    }

   
}
