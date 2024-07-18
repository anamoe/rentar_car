<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function login()
    {
        if (auth()->check()) {
            // switch (Auth::user()->role) {
            //     case 'admin':
            //         return redirect('dashboard');
            //         break;
            //     case 'owner':
            //         return redirect('/owner/dashboard');
            //         break;
            //     case 'customer':
            //         return redirect('/customer/dashboard');
            //         break;
            //     case 'driver':
            //         return redirect('/driver/dashboard');
            //         break;
            // }
                    return redirect('dashboard');

        }
        return view('auth.login');
    }
    public function postlogin(Request $request)
    {

        $input = $request->all();
        $rules = [

            'email'     => 'required',
            'password'  => 'required',

        ];
        // error message untuk validasi
        $message = [
            'required' => ':attribute tidak boleh kosong!'
        ];
        // instansiasi validator
        $validator = Validator::make($request->all(), $rules, $message);

        // proses validasi
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (User::where('email', '=', $input['email'])->first() == true) {
            if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
                switch (auth()->user()->role) {
                    case 'admin':
                        return redirect('admin/dashboard');
                        break;
                    case 'owner':
                        return redirect('owner/dashboard');
                        break;
                    case 'driver':
                        return redirect('driver/dashboard');
                        break;
                    case 'customer':
                        return redirect('customer/dashboard');
                        break;
                }
            } else {
                return redirect()->back()
                    ->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()
                ->with('error', 'Email tidak ada atau belum terdaftar');
        }
    }

    public function logout()
    {

        Auth::logout();
        return redirect('/');
    }

    public function profil()
    {
        $users = User::where('id', auth()->user()->id)->first();
        return view('admin.profil', compact('users'));
    }

    public function profile_update(Request $request)
    {
        $req = $request->all();
        if ($request->password) {
            auth()->user()->update([
                'password' => bcrypt($request->password),
                // 'name'=>$request->name,
                'username' => $request->username,
            ]);
        } else {

            if($request->hasFile('foto')){
                $tujuan_upload = public_path('images/profil');
                $file = $request->file('foto');
                $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
                $file->move($tujuan_upload, $namaFile);
                // return $file;
                // $req['foto'] = $namaFile;
            }
            // // return $req;
            auth()->user()->update([
                // 'name'=>$request->name,
                'username' => $request->username,
            ]);
        }


        return redirect()->back()->with('success', 'Profil Berhasil diupdate');
    }
}
