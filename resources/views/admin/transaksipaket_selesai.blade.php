@extends('layouts-admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Riwayat Transaksi Paket Rental
        </h6>
    </div>
    <div class="card-body">

        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pembayaran</th>
                        <th>Nama Paket</th>
                        <th>Jenis Paket</th>
                        <th>Destinasi</th>
                        <th>Mobil</th>
                        <th>Driver</th>
                        <th>Status Bayar</th>
                        <th>Status Pengantaran</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->kode_pembayaran}}</td>
                        <td>{{$item->nama_paket}}</td>
                        <td>{{$item->jenis_paket}}</td>
                        <td>{{$item->destinasi}}</td>
                        <td>{{$item->merk}}</td>
                        <td>{{$item->nama_driver}}</td>
                        <td>{{$item->status_bayar}}</td>
                        <td>{{$item->status_pengantaran}}</td>
                    
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
                    </tr>

                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
</div>

@endsection