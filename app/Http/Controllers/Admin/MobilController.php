<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class MobilController extends Controller
{
    public function index()
    {
        $data = Mobil::all();
        return view('admin.mobil',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $owner = User::where('role','owner')->get();
        return view('admin.mobil-add',compact('owner'));
    }

    public function store(Request $request)
    {
       
        $data = $request->validate([
    
            'model'=>'required',
            'merk'=>'required',
            'tahun'=>'required',
            'owner_id'=>'required',
        ]);
        
        // if($request->hasFile('foto')){
            $tujuan_upload = public_path('mobil');
            $file = $request->file('foto');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['foto'] = $namaFile;
        // }

        Mobil::create($data);
        return redirect('admin/mobil')
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
        $data = Mobil::find($id);
        $owner = User::where('role','owner')->get();

        return view('admin.mobil-edit',compact('data','id','owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate([
    
            'mobil'=>'required',
            'merk'=>'required',
            'tahun'=>'required',
            'owner_id'=>'required',
        ]);
        if($request->hasFile('foto')){
            $tujuan_upload = public_path('mobil');
            $file = $request->file('foto');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            File::delete($tujuan_upload.'/'.Mobil::find($id)->foto);
            $file->move($tujuan_upload, $namaFile);
            $data['foto'] = $namaFile;
        }

        Mobil::findOrFail($id)->update($data);
        return redirect('admin/mobil')
        ->with('success',' Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $p= Mobil::findOrFail($id);
        $tujuan_upload = public_path('mobil');
        if($p){

           
            File::delete($tujuan_upload . '/' . Mobil::find($id)->foto);
        }
        $p->delete();
        return redirect()->back()->with('success',' Berhasil DiHapus');
    }
}
