<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }
    //
    public function landingpage(){
        $mobil =Mobil::orderBy('id','desc')->get();
        return view('welcome',compact('mobil'));
    }

    public function detail_mobil($id){
        $mobil =Mobil::where('id',$id)->first();
        return view('detail-mobil',compact('mobil'));
    }

}
