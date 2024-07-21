<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Mobil;
use App\Models\PaketRental;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }
    //
    public function landingpage(){
        $mobil =Mobil::where('status_mobil','free')->orderBy('id','desc')->get();
        $paket =PaketRental::orderBy('id','desc')->get();
      
        return view('welcome',compact('mobil','paket'));
    }

    public function detail_mobil($id){
        $customer =Customer::join('users','customers.user_id','users.id')->where('users.id',auth()->user()->id)->first();
        // return $customer;
        $mobil =Mobil::where('id',$id)->first();
        return view('detail-mobil',compact('mobil','customer'));
    }

}
