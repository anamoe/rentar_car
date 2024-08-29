@extends('layouts-user.master')
@push('css')
<style>
	.car-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    overflow-x: auto; /* Memungkinkan scroll horizontal */
    scroll-snap-type: x mandatory; /* Menggunakan scroll snap untuk snap ke setiap item */
    -webkit-overflow-scrolling: touch; /* Untuk pengalaman scrolling yang halus di perangkat mobile iOS */
}

.car-item {
    scroll-snap-align: center; /* Memastikan setiap item di-scroll ke tengah viewport */
}

.car-wrap {
    border: 1px solid #ccc;
    padding: 10px;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
}

.img {
    background-size: cover;
    background-position: center;
    height: 200px; /* Atur tinggi gambar sesuai kebutuhan Anda */
    width: 100%;
}

.text {
    padding: 10px;
    text-align: center;
}

.package-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    overflow-x: auto; /* Memungkinkan scroll horizontal */
    scroll-snap-type: x mandatory; /* Menggunakan scroll snap untuk snap ke setiap item */
    -webkit-overflow-scrolling: touch; /* Untuk pengalaman scrolling yang halus di perangkat mobile iOS */
}

.package-item {
    scroll-snap-align: center; /* Memastikan setiap item di-scroll ke tengah viewport */
}

.package-wrap {
    border: 1px solid #ccc;
    padding: 10px;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
}

.img {
    background-size: cover;
    background-position: center;
    height: 200px; /* Atur tinggi gambar sesuai kebutuhan Anda */
    width: 100%;
}

.text {
    padding: 10px;
    text-align: center;
}


</style>
@endpush
@section('content')



<section class="ftco-section ftco-no-pt bg-light" style="margin-top:100px ;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<h2 class="mb-2">BERBAGAI PILIHAN MOBIL</h2>
			</div>
		</div>
		
		<div class="row">
    <div class="col-md-12">
        <div class="car-gallery">
            @foreach($mobil as $v)
            <div class="car-item">
                <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end" style="background-image: url('public/mobil/{{$v->foto}}');">
                    </div>
                    <div class="text">
                        <center>
                            <h2 class="mb-0"><a href="#">{{$v->merk}} - {{$v->model}} - {{$v->tahun}}</a></h2>
                            <a href="{{url('customer/detail-mobil',$v->id)}}" class="btn btn-primary">Book now</a>
                        </center>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

		
	</div>
	</div>
</section>

@endsection