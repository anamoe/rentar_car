@extends('layouts-admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Edit  Mobil
            <a href="{{url('admin/paketrental')}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{url('admin/paketrental',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="" class="form-label">Nama Paket</label>
                    <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" name="nama_paket" value="{{$data->nama_paket}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Jenis Paket</label>
                    <input type="text" class="form-control @error('jenis_paket') is-invalid @enderror" name="jenis_paket" value="{{$data->jenis_paket}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Destinasi</label>
                    <input type="text" class="form-control @error('destinasi') is-invalid @enderror" name="destinasi" value="{{$data->destinasi}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Harga</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{$data->harga}}">
                </div>
                <div class="form-group">
                <label for="" class="form-label">Foto Paket</label>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" accept="image/*">
            </div>


                <button type="submit" class="btn btn-primary float-end mt-3">Update</button>

            </form>
        </div>
    </div>

</div>

@endsection