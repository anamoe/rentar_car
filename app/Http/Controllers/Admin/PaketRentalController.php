<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketRental;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PaketRentalController extends Controller
{
    public function index()
    {
        $data = PaketRental::all();
        return view('admin.paket',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.paketrental-add');
    }

    public function store(Request $request)
    {
       
        $data = $request->validate([
    
            'nama_paket'=>'required',
            'jenis_paket'=>'required',
            'destinasi'=>'required',
            'harga'=>'required',
        ]);
        
        // if($request->hasFile('foto')){
            $tujuan_upload = public_path('PaketRental');
            $file = $request->file('foto');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['foto'] = $namaFile;
        // }

        PaketRental::create($data);
        return redirect('admin/paketrental')
        ->with('success',' Berhasil Ditambahkan');
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
        $data = PaketRental::find($id);

        return view('admin.paketrental-edit',compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate([
    
            'nama_paket'=>'required',
            'jenis_paket'=>'required',
            'destinasi'=>'required',
            'harga'=>'required',
        ]);
        if($request->hasFile('foto')){
            $tujuan_upload = public_path('PaketRental');
            $file = $request->file('foto');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            File::delete($tujuan_upload.'/'.paket::find($id)->foto);
            $file->move($tujuan_upload, $namaFile);
            $data['foto'] = $namaFile;
        }

        PaketRental::findOrFail($id)->update($data);
        return redirect('admin/paketrental')
        ->with('success',' Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $p= PaketRental::findOrFail($id);
        $tujuan_upload = public_path('PaketRental');
        if($p){

           
            File::delete($tujuan_upload . '/' . PaketRental::find($id)->foto);
        }
        $p->delete();
        return redirect()->back()->with('success',' Berhasil DiHapus');
    }
}
