@extends('layouts-admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Mobil
            <a href="{{url('admin/mobil/create')}}" class="btn btn-sm float-end btn-light">Add</a>
        </h6>
    </div>
    <div class="card-body">

        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Tahun</th>
                        <th>Foto Mobil</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->merk}}</td>
                        <td>{{$item->model}}</td>
                        <td>{{$item->tahun}}</td>
                        <td>
                            <img src="{{asset('mobil/'.$item->foto)}}" width="50" alt="">
                        </td>
                        <td>
                            <a href="{{url('admin/mobil/'.$item->id.'/edit')}}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{url('admin/mobil/'.$item->id.'/delete')}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">KOSONG</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>

                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
</div>

@endsection