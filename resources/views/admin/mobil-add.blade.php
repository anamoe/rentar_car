@extends('layouts-admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Add Mobil
            <a href="{{url('admin/mobil')}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{url('admin/mobil')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="" class="form-label">Nama Owner</label>
                    <select name="owner_id" class="form-control">
                        @foreach ($owner as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="" class="form-label">Merk</label>
                    <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Model</label>
                    <input type="text" class="form-control @error('model') is-invalid @enderror" name="model">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Tahun</label>
                    <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Ongkos bbm</label>
                    <input type="number" class="form-control @error('biaya_bbm') is-invalid @enderror" name="biaya_bbm">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Ongkos driver</label>
                    <input type="number" class="form-control @error('biaya_driver') is-invalid @enderror" name="biaya_driver">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Biaya total(sewa)</label>
                    <input type="number" class="form-control @error('biaya_total') is-invalid @enderror" name="biaya_total">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Foto Mobil</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" accept="image/*">
                </div>


                <button type="submit" class="btn btn-primary float-end mt-3">Tambah</button>

            </form>
        </div>
    </div>

</div>

@endsection