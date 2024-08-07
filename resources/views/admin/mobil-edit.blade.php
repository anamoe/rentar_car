@extends('layouts-admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Edit Berita Artikel
            <a href="{{url('admin/mobil')}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{url('admin/mobil/'.$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')


                <div class="form-group">
                    <label for="" class="form-label">Nama Owner</label>
                    <select name="owner_id" class="form-control">
                        @foreach ($owner as $user)
                        <option value="{{ $user->id }}" @if($user->id == $data->owner_id) selected @endif>
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="" class="form-label">Merk</label>
                    <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{$data->merk}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Model</label>
                    <input type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{$data->model}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Tahun</label>
                    <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{$data->tahun}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Ongkos bbm</label>
                    <input type="number" class="form-control @error('biaya_bbm') is-invalid @enderror" name="biaya_bbm" value="{{$data->biaya_bbm}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Ongkos driver</label>
                    <input type="number" class="form-control @error('biaya_driver') is-invalid @enderror" name="biaya_driver" value="{{$data->biaya_driver}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Biaya total(sewa)</label>
                    <input type="number" class="form-control @error('biaya_total') is-invalid @enderror" name="biaya_total" value="{{$data->biaya_total}}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Foto Mobil</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary float-end mt-3">Update</button>

            </form>
        </div>
    </div>

</div>

@endsection