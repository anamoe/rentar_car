@extends('layouts-admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Edit Kontak
            <a href="{{url('admin/kontak')}}" class="btn btn-sm float-end btn-light">Kembali</a>
        </h6>
    </div>
 
<div class="card">
    <div class="card-body">
        <form action="{{url('admin/kontak/'.$id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" value="{{$data->judul}}" name="judul">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Isi</label>
                @if($data->type=='maps')
                <textarea style="height: 150px;" type="text" class="form-control @error('isi') is-invalid @enderror" value="" name="isi">{{$data->isi}}
                </textarea>
                @else
                <input type="text" class="form-control @error('isi') is-invalid @enderror" value="{{$data->isi}}" name="isi">
            @endif
            </div>

        
            <button type="submit" class="btn btn-primary float-end mt-3">Ubah</button>

        </form>
    </div>
</div>

</div>

@endsection