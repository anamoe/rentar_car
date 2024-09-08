@extends('layouts-admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Laporan Pendapatan Owner
        </h6>
    </div>
    <div class="card-body">

        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Owner</th>
                        <th>Mobil</th>
                        <th>Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->merk}} - {{$item->model}}</td>
                        <td>{{$item->total_pendapatan}}</td>
                    </tr>
                   
                    @empty
                    <tr>
                        <td class="text-center"></td>

                        <td class="text-center">KOSONG</td>
                        <td class="text-center"></td>


                    </tr>

                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
</div>

@endsection