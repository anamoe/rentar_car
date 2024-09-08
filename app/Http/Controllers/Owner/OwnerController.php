<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\LaporanKerusakan;
use App\Models\TransaksiRental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    //
    public function list_laporan()
    {
        $data = LaporanKerusakan::leftjoin('mobils', 'laporan_kerusakans.mobil_id', 'mobils.id')
        ->select('mobils.*', 'laporan_kerusakans.*')
        ->orderBy('laporan_kerusakans.id', 'desc')->get();
        return view('owner.laporan_kerusakan',compact('data'));
    }
    public function laporan_pendapatan_owner()
    {
        $data = TransaksiRental::join('mobils', 'transaksi_rentals.mobil_id', 'mobils.id')
            ->join('users as owner', 'mobils.owner_id', 'owner.id')
            ->leftjoin('paket_rentals', 'transaksi_rentals.paket_id', 'paket_rentals.id')
            ->select('mobils.id', 'mobils.merk', 'mobils.model','owner.name', DB::raw('SUM(mobils.biaya_sewa) as total_pendapatan'))
            ->groupBy('mobils.id', 'mobils.merk','mobils.model','owner.name',)
            ->orderBy('total_pendapatan', 'desc')
            ->get();

        // return $data;


        return view('admin.laporan_pendapatan_owner', compact('data'));
    }
}
