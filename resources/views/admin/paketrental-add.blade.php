@extends('layouts-admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Add Paket
            <a href="{{url('admin/paketrental')}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{url('admin/paketrental')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label">Nama Paket</label>
                    <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" name="nama_paket" required>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Jenis Paket</label>
                    <input type="text" class="form-control @error('jenis_paket') is-invalid @enderror" name="jenis_paket">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Destinasi</label>
                    <input type="text" class="form-control @error('destinasi') is-invalid @enderror" name="destinasi">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Harga</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Foto Paket</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Deskripsi (Jika ada)</label>
                    <textarea type="text" class="form-control" name="deskripsi"></textarea>
                </div>

                <button type="submit" class="btn btn-primary float-end mt-3">Tambah</button>

            </form>
        </div>
    </div>

</div>

@endsection