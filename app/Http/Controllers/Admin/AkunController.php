<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AkunController extends Controller
{
    public function index()
    {
        $data = User::whereNot('role','customer')->get();
        return view('admin.akun',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.akun-add');
    }

    public function store(Request $request)
    {
       
        $data = $request->validate([
    
            'name'=>'required',
            'email'=>'required',
            'username'=>'required',
            // 'password'=>'required',
            'phone'=>'required',
            'role'=>'required',
        ]);
        $data['password'] = bcrypt($request->password);
        

        if($request->role=='driver'){
        
        if($request->hasFile('foto_sim')){
            $tujuan_upload = public_path('foto_sim');
            $file = $request->file('foto_sim');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['foto_sim'] = $namaFile;
        }
        if($request->hasFile('foto_ktp')){
            $tujuan_upload = public_path('foto_ktp');
            $file = $request->file('foto_ktp');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            $data['foto_ktp'] = $namaFile;
        }
    }
   

        User::create($data);

        return redirect('admin/akun')
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
        $data = User::find($id);

        return view('admin.akun-edit',compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate([
    
            'name'=>'required',
            'email'=>'required',
            'username'=>'required',
            'phone'=>'required',
            'role'=>'required',
        ]);

        if($request->password){
        $data['password'] = bcrypt($request->password);

            if($request->role=='driver'){
        
                if($request->hasFile('foto_sim')){
                    $tujuan_upload = public_path('foto_sim');
                    $file = $request->file('foto_sim');
                    $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
                    $file->move($tujuan_upload, $namaFile);
                    $data['foto_sim'] = $namaFile;
                }
                if($request->hasFile('foto_ktp')){
                    $tujuan_upload = public_path('foto_ktp');
                    $file = $request->file('foto_ktp');
                    $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
                    $file->move($tujuan_upload, $namaFile);
                    $data['foto_ktp'] = $namaFile;
                }
            }
           
        }else{
            if($request->role=='driver'){
        
                if($request->hasFile('foto_sim')){
                    $tujuan_upload = public_path('foto_sim');
                    $file = $request->file('foto_sim');
                    $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
                    $file->move($tujuan_upload, $namaFile);
                    $data['foto_sim'] = $namaFile;
                }
                if($request->hasFile('foto_ktp')){
                    $tujuan_upload = public_path('foto_ktp');
                    $file = $request->file('foto_ktp');
                    $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
                    $file->move($tujuan_upload, $namaFile);
                    $data['foto_ktp'] = $namaFile;
                }
            }
           

        }
      

        User::findOrFail($id)->update($data);
        return redirect('admin/akun')
        ->with('success',' Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $p= User::findOrFail($id);
        $tujuan_upload = public_path('User');
        if($p){

           
            File::delete($tujuan_upload . '/' . User::find($id)->foto);
        }
        $p->delete();
        return redirect()->back()->with('success',' Berhasil DiHapus');
    }
}
