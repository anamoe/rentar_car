@extends('layouts-admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Kontak Informasi
            <!-- <a href="{{url('admin/kontak/create')}}" class="btn btn-sm float-end btn-light">Add</a> -->
        </h6>
    </div>
    <div class="card-body">

        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Type</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->judul}}</td>
                        <td>{{Str::limit($item->isi, $limit = 20, $end = '...') }}</td>
                        <td>
                            <a href="{{url('admin/kontak/'.$item->id.'/edit')}}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{url('admin/kontak/'.$item->id.'/delete')}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center">Tidak ada data</td>
                        <td class="text-center">Tidak ada data</td>
                        <td class="text-center">Tidak ada data</td>
                        <td class="text-center">Tidak ada data</td>
                        <td class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        
    </div>
</div>

@endsection