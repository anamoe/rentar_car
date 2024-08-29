<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\LaporanKerusakan;
use Illuminate\Http\Request;

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
}
