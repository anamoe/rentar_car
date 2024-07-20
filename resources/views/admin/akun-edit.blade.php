@extends('layouts-admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Edit Akun
            <a href="{{url('admin/akun')}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{url('admin/akun',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$data->username}}">
                            @error('username')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data->email}}">

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}">
                        </div>
                    </div>
                </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Role</label>
                                <select name="role" class="form-control">
                                    <option value="owner"{{$data->role=='owner'?'selected':''}}>owner</option>
                                    <option value="driver"{{$data->role=='driver'?'selected':''}}>driver</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">No. HP</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$data->phone}}">
                            </div>
                        </div>
                    </div>

                    @if($data->role=='driver')
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">FOTO KTP (untuk Driver)</label>
                                <input type="file" class="form-control" name="foto_ktp" accept="*\image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">FOTO SIM (Untuk Driver)</label>
                                <input type="file" class="form-control" name="foto_sim" accept="*\image">
                            </div>
                        </div>
                    </div>
                    @else
                    @endif

                    <button type="submit" class="btn btn-primary float-end mt-3">Update</button>

            </form>
        </div>
    </div>

</div>

@endsection