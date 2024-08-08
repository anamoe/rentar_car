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

    protected function initPaymentGateway()
    {
        \Midtrans\Config::$serverKey = 'SB-Mid-server-uxJhvwAe9nhxc9KB5ILS-OAX';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $data = TransaksiRental::join('mobils', 'transaksi_rentals.mobil_id', 'mobils.id')
        ->leftjoin('users as driver', 'transaksi_rentals.driver_id', 'driver.id')
        ->join('users as customer', 'transaksi_rentals.customer_id', 'customer.id')
        ->leftjoin('paket_rentals', 'transaksi_rentals.paket_id', 'paket_rentals.id')
        ->select('driver.name as nama_driver', 'customer.name as nama_customer', 'paket_rentals.*','mobils.*', 'transaksi_rentals.*')
        ->where('transaksi_rentals.customer_id',auth()->user()->id)->get();
        // return $data;
        return view('transaksi-user',compact('data'));
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
        $orderid = Str::upper($randomString);

        $this->initPaymentGateway();



        $customerDetails = [
            'first_name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'phone' => User::where('id', auth()->user()->id)->first()->phone,
        ];

        $params = [
            'enable_payments' => [
                'credit_card', 'mandiri_clickpay', 'cimb_clicks',
                'bca_klikbca', 'bca_klikpay', 'bri_epay', 'echannel', 'permata_va',
                'bca_va', 'bni_va', 'other_va', 'gopay', 'indomaret',
                'danamon_online', 'akulaku'
            ],
            'transaction_details' => [
                'order_id' => $orderid,
                'gross_amount' => $request->pembayaran,
            ],
            'customer_details' => $customerDetails,
            'expiry' => [
                'start_time' => date('Y-m-d H:i:s T'),
                'unit' => 'days',
                'duration' => 7,
            ],
        ];

        $snap = \Midtrans\Snap::createTransaction($params);


        // $book->jumlah_pembayaran =$params['transaction_details']['gross_amount'];
        // $book->konsul_id = $konsul->id;
        // $book->kode_pembayaran = $params['transaction_details']['order_id'];
        // $book->status_pembayaran = $request->input('status_pembayaran','pending');
        // $book->payment_token = $snap->token;
        // $book->payment_url = $snap->redirect_url;
        // $book->save();

        // $last_id = $book->id;


        $id_transaksi =  TransaksiRental::create([
            'customer_id' => auth()->user()->id,
            // 'paket_id'=>$request->paket_id,
            'mobil_id' => $request->mobil_id,
            'pembayaran' => $request->pembayaran,
            'status_bayar' => 'pending',
            'status_pengantaran' => 'belum',
            'tanggal_penjemputan' => $request->tanggal_penjemputan,
            'jam_penjemputan' => $request->jam_penjemputan,
            'alamat_penjemputan' => $request->alamat_penjemputan,
            'payment_token' => $snap->token,
            'payment_url' =>  $snap->redirect_url,
            'kode_pembayaran' => $params['transaction_details']['order_id'],
        ]);
        Mobil::where('id', $request->id_mobil)->update([
            'status_mobil' => 'book'
        ]);

        // User::where('role', 'driver')->where('id', $request->driver_id)->update([
        //     'status_driver' => 'book'
        // ]);

        session()->flash('success', 'Sukses melakukan booking');
        return redirect('customer/pemesanan/' . $id_transaksi->id);

        // return redirect()->back();
        // ->with('success',' Berhasil Melakukan booking');
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


    public function pemesanan($id)
    {
        $pemesanan = TransaksiRental::leftjoin('mobils', 'transaksi_rentals.mobil_id', 'mobils.id')
            ->leftjoin('users as driver', 'transaksi_rentals.driver_id', 'driver.id')
            ->join('users as customer', 'transaksi_rentals.customer_id', 'customer.id')
            ->leftjoin('paket_rentals', 'transaksi_rentals.paket_id', 'paket_rentals.id')
            ->select('driver.name as nama_driver', 'customer.name as nama_customer', 'paket_rentals.*', 'transaksi_rentals.*')
            ->where('transaksi_rentals.id', $id)->first();
        // return $pemesanan;

        if ($pemesanan->status_bayar == 'pending') {
            return view('pemesanan_view', compact('pemesanan'));
        } else {
            return redirect('customer/transaksi-paket');
        }
    }

    
    public function cancel_pemesanan($id)
    {
        $p = TransaksiRental::where('id',$id)->first();
    
        $p->update([
            'status_bayar' => 'cancel',
        ]);

        Mobil::where('id', $p->id_mobil)->update([
            'status_mobil' => 'free'
        ]);

        session()->flash('success', 'Sukses membatalkan pesanan');
        return redirect('customer/transaksi-paket');

      
    }

    public function notification_payment(Request $request)
    {
        $this->initPaymentGateway();

        //mengambil response dari midtrans
        $payload = $request->getContent();
        //melakukan parsing response dari midtrans
        $notification = json_decode($payload);
        // $json = json_decode($request->get('json')); //nama json dipanggil dari token yg awto kepanggil dari API

        // return $notification;

        //melakukan pengecekan status transaksi
        // return $notification->va_numbers[0]->bank;
        if ($notification->transaction_status == "settlement") {
            $p = TransaksiRental::where('kode_pembayaran', $notification->order_id)->first();

            if ($notification->payment_type == "bank_transfer") {
                // Ambil bank dari va_numbers
                $bank = isset($notification->va_numbers[0]->bank) ? $notification->va_numbers[0]->bank : null;
            } elseif ($notification->payment_type == "qris") {
                // Cek acquirer (dalam kasus ini 'issuer') dari data QRIS
                $bank = isset($notification->acquirer) ? $notification->acquirer : null;
            } else {
                // Default jika jenis pembayaran tidak dikenali
                $bank = null;
            }

            $p->update([
                'status_bayar' => 'terbayar',
                'tanggal_pembayaran' => date('Y-m-d'),
                'kode_transaksi' => $notification->transaction_id,
                'metode_pembayaran' => $bank
                // 'metode_pembayaran' => $notification->va_numbers[0]->bank

            ]);
        }
    }
}
