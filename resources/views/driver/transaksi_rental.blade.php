@extends('layouts-admin.master')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h6 class="mb-0 text-white">Orderan Paket Rental Driver
            <a href="{{url('admin/transaksipaketrental/create')}}" class="btn btn-sm float-end btn-light">Add</a>
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
                        <th>Harga DP 50%</th>
                        <th>Aksi</th>
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
                        <td>{{$item->driver}}</td>
                        <td>{{$item->status_bayar}}</td>
                        <td>{{$item->status_pengantaran}}</td>
                        <td>{{$item->pembayaran_dp}}</td>
                        <td>

                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$item->id}}">
                                Selesaikan
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="staticBackdrop{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Pengantaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('driver/status-pengantaran',$item->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="" class="form-label">Status Pengantaran</label>
                                            <select name="status" class="form-control">
                                                <option value="selesai">Selesai</option>
                                            </select>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
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
                        <td class="text-center"></td>

                    </tr>

                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
</div>

@endsection