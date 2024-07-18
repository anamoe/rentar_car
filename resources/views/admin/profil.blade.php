@extends('layouts-admin.master')

@section('content')
<br/>
<h5 class="fw-semibold">
<a href="{{ url('admin/tentangkami') }}">
    <i class="fas fa-arrow-left bg-danger rounded-circle text-white"></i> Kembali
</a>
</h5>

Edit Profil 
<div class="section mb-5 p-2">
    <form action="{{url('profil',$users->id)}}" method="post" enctype="multipart/form-data">
        @csrf
   
        <div class="card " style="background-color: green">
        <!-- <div class="text-center mb-3">
                    <img src="{{asset('profil/'.auth()->user()->profil)}}" alt="Profil Image" class="rounded-circle" width="100" height="100">
                    <input type="file" name="foto" accept="image/*">
                </div> -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
              

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label style="color: white;" class="label" for="name">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{auth()->user()->name}}" name="name" id="nama" placeholder="Nama">
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label  style="color: white;" class="label" for="name">Username</label>
                        <input type="text" class="form-control  @error('username') is-invalid @enderror" value="{{$users->username }}"  name="username" id="tanggal_lahir" placeholder="Tanggal Lahir">
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label  style="color: white;"class="label" for="name">Password</label>
                        <input type="number" class="form-control @error('password') is-invalid @enderror" value="" name="password" placeholder="Password">
                    </div>
                </div>
               
            </div>

            <!-- <div class="col-md-6">
          
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label  style="color: white;"class="label" for="name">No Telepon</label>
                        <input type="number" class="form-control @error('no_telp') is-invalid @enderror" value="{{$users->no_telp }}" name="no_telp" placeholder="No Telepon">
                    </div>
                </div>
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label  style="color: white;"class="label" for="name">Password</label>
                        <input type="number" class="form-control @error('password') is-invalid @enderror" value="" name="password" placeholder="Password">
                    </div>
                </div>

               

            </div> -->
        </div>
    </div>
</div>
<br/>

        <div class="form-button-group transparent">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Simpan</button>
        </div>

    </form>
</div>

@endsection

@push('js')

@endpush