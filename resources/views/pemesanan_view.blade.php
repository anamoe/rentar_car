@extends('layouts-user.master')

@push('css')

<style>
    #snap-midtrans{
        display: block; height: inherit; width: inherit; border: none; min-height: 600px !important; min-width: 320px; border-radius: inherit;"
    }
</style>

@endpush

@section('content')


<div class="row p-5 mt-5">
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mb-5">
        <div class="col-md-6">
            <h4 class="title fw-bold">Pilih Metode Pembayaran</h4>
            <div class="w-100 h-100">
                <iframe src="{{$pemesanan->payment_url}}" frameborder="0" id="snap-midtrans"></iframe>
            </div>

        </div>

        <div class="col-md-6">

            <p>Kode Booking : <span class="fw-bold float-end">{{$pemesanan->kode_pembayaran}}</span></p>
            <p>Customer : <span class="fw-bold float-end">{{$pemesanan->nama_customer}}</span></p>
            <p>Nama Paket : <span class="fw-bold float-end">{{$pemesanan->nama_paket}}</span></p>
            <p>Harga : <span class="fw-bold float-end">{{$pemesanan->pembayaran_dp}}</span></p>
            <p>Status : <span class="fw-bold float-end badge {{$pemesanan->status_bayar == 'pending' ? 'bg-danger' : 'bg-success'}}">{{$pemesanan->status_bayar}}</span></p>
            <!-- <p>
                <a href="{{url('customer/pemesanan/'.$pemesanan->id)}}" class="btn btn-sm btn-primary">Refresh</a>
            </p> -->

            <div class="card mt-3 bg-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 text-center">
                            <i class='bx bx-receipt text-center fw-bold text-white' style="font-size:44px;"></i>
                        </div>
                        <div class="col-9">
                            <h6 class="fw-bold text-white">Cek kembali metode pembayaranmu</h6>
                            <p class="text-white">Pastikan kamu mengecek kembali metode pembayarmu untuk menghindari
                                adanya kesalahan transfer.</p>
                        </div>
                        <div class="col-3 text-center">
                            <i class='bx bx-money text-center fw-bold text-white' style="font-size:44px;"></i>
                        </div>
                        <div class="col-9">
                            <h6 class="fw-bold text-white">Cek kembali metode pembayaranmu</h6>
                            <p class="text-white">Pastikan kamu mengecek kembali metode pembayarmu untuk menghindari
                                adanya kesalahan transfer.</p>
                        </div>
                    </div>
                </div>
            </div>

      

        </div>
    </div>

</div>

</div>


@endsection

@push('js')

<script>
    function iFrameResize(){
        
    }
</script>

@endpush