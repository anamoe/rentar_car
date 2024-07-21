@extends('layouts-admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Transaksi Paket Rental
            <a href="{{url('admin/transaksipaketrental/create')}}" class="btn btn-sm float-end btn-light">Add</a>
        </h6>
    </div>
    <div class="card-body">

        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Paket</th>
                        <th>Jenis Paket</th>
                        <th>Destinasi</th>
                        <th>Mobil</th>
                        <th>Driver</th>
                        <th>Status Bayar</th>
                        <th>Status Pengantaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->kode_transaksi}}</td>
                        <td>{{$item->nama_paket}}</td>
                        <td>{{$item->jenis_paket}}</td>
                        <td>{{$item->destinasi}}</td>
                        <td>{{$item->mobil}}</td>
                        <td>{{$item->driver}}</td>
                        <td>{{$item->status_bayar}}</td>
                        <td>{{$item->status_pengantaran}}</td>
                        <td>{{$item->harga}}</td>
                        <td>

                            <a href="{{url('admin/paketrental/'.$item->id.'/caridriver')}}" class="btn btn-sm btn-primary">Cari Driver</a>
                            <a href="{{url('admin/paketrental/'.$item->id.'/delete')}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">KOSONG</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>

                    </tr>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                       Cari Driver
                    </button>

                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Cari Driver</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Kirim Driver</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
</div>

@endsection