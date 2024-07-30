@extends('layouts-admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Add Laporan Kerusakan : {{$mobil->model}} - {{$mobil->merk}} - {{$mobil->tahun}}
            <a href="{{url('admin/laporan-kerusakan')}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{url('admin/laporan-kerusakan')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="" class="form-label">Kondisi</label>
                    <input type="text" class="form-control @error('kondisi') is-invalid @enderror" name="kondisi">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Keterangan</label>
                    <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"></textarea>
                </div>
           
                <button type="submit" class="btn btn-primary float-end mt-3">Tambah</button>

            </form>
        </div>
    </div>

</div>

@endsection