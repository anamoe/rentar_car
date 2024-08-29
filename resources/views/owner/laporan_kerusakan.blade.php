@extends('layouts-admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Laporan Kerusakan
        </h6>
    </div>
    <div class="card-body">

        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Laporan</th>
                        <th>Mobil</th>
                        <th>Kondisi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->kode_laporan}}</td>
                        <td>{{$item->merk}} - {{$item->model}}</td>
                        <td>{{$item->kondisi}}</td>
                        <td>{{$item->keterangan}}</td>
                    </tr>
                   
                    @empty
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-center"></td>

                        <td class="text-center">KOSONG</td>
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