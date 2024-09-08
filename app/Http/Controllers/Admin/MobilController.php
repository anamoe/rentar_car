<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanKerusakan;
use App\Models\Mobil;
use App\Models\TransaksiRental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MobilController extends Controller
{
    public function index()
    {
        $data = Mobil::all();
        return view('admin.mobil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $owner = User::where('role', 'owner')->get();
        return view('admin.mobil-add', compact('owner'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([

            'model' => 'required',
            'merk' => 'required',
            'tahun' => 'required',
            'owner_id' => 'required',
            'biaya_admin' => 'required',
            'biaya_driver' => 'required',
            'biaya_total' => 'required',
            'biaya_sewa' => 'required',
        ]);

        // if($request->hasFile('foto')){
        $tujuan_upload = public_path('mobil');
        $file = $request->file('foto');
        $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
        $file->move($tujuan_upload, $namaFile);
        $data['foto'] = $namaFile;
        // }
        $data['deskripsi'] = $request->deskripsi;


        Mobil::create($data);
        return redirect('admin/mobil')
            ->with('success', ' Berhasil Ditambahkan');
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
        $data = Mobil::find($id);
        $owner = User::where('role', 'owner')->get();

        return view('admin.mobil-edit', compact('data', 'id', 'owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //


        $data = $request->validate([

            'merk' => 'required',
            'tahun' => 'required',
            'owner_id' => 'required',
            'biaya_admin' => 'required',
            'biaya_driver' => 'required',
            'biaya_total' => 'required',
            'biaya_sewa' => 'required',

        ]);
        if ($request->hasFile('foto')) {
            $tujuan_upload = public_path('mobil');
            $file = $request->file('foto');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            File::delete($tujuan_upload . '/' . Mobil::find($id)->foto);
            $file->move($tujuan_upload, $namaFile);
            $data['foto'] = $namaFile;
        }
        $data['deskripsi'] = $request->deskripsi;


        Mobil::findOrFail($id)->update($data);
        return redirect('admin/mobil')
            ->with('success', ' Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $p = Mobil::findOrFail($id);
        $tujuan_upload = public_path('mobil');
        if ($p) {


            File::delete($tujuan_upload . '/' . Mobil::find($id)->foto);
        }
        $p->delete();
        return redirect()->back()->with('success', ' Berhasil DiHapus');
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

    public function list_laporan()
    {
        $data = LaporanKerusakan::leftjoin('mobils', 'laporan_kerusakans.mobil_id', 'mobils.id')
        ->select('mobils.*', 'laporan_kerusakans.*')
        ->orderBy('laporan_kerusakans.id', 'desc')->get();
        return view('owner.laporan_kerusakan',compact('data'));
    }
}
