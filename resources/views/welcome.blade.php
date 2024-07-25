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
<div id="heroCarousel" class="carousel slide" data-ride="carousel" data-interval="1500">
	<ol class="carousel-indicators">
		@foreach($mobil as $index => $v)
		<li data-target="#heroCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
		@endforeach
	</ol>
	<div class="carousel-inner">
		@foreach($mobil as $index => $v)
		<div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
			<div class="hero-wrap ftco-degree-bg" style="background-image: url('public/mobil/{{ $v->foto }}');" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
				<div class="container">
					<div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
						<div class="col-lg-8 ftco-animate">
							<div class="text w-100 text-center mb-md-5 pb-md-5">
								<h1 class="mb-4">SELAMAT DATANG</h1>
								<p style="font-size: 18px;"></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>

</div>

<a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
	<span class="carousel-control-next-icon" aria-hidden="true"></span>
	<span class="sr-only">Next</span>
</a>
</div>



<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<h2 class="mb-2">BERBAGAI PILIHAN MOBIL</h2>
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-md-12">
				<div class="carousel-car owl-carousel">
					@foreach($mobil as $v)
					<div class="item">
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
		</div> -->
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
<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<h2 class="mb-2">BERBAGAI PILIHAN DESTINASI WISATA</h2>
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-md-12">
				<div class="carousel-car owl-carousel">
					@foreach($paket as $v)
					<div class="item">
						<div class="car-wrap rounded ftco-animate">
							<div class="img rounded d-flex align-items-end" style="background-image: url('public/PaketRental/{{$v->foto}}');">

							</div>
							<div class="text">
								<h2 class="mb-0"><a href="#">{{$v->nama_paket}}</a></h2>
								<div class="d-flex mt-3">
									<p class="cat" style="color: black;">{{$v->destinasi}}</p>
									<p class="price ml-auto">Rp. {{$v->harga}},00</p>
								</div>
								<p class="d-flex mb-0 d-block">
									<a href="{{url('customer/detail-paket',$v->id)}}" class="btn btn-primary py-2 mr-1">Booking</a>
								</p>

							</div>
						</div>
					</div>
					@endforeach


				</div>
			</div>
		</div> -->
		<div class="row">
    <div class="col-md-12">
        <div class="package-gallery">
            @foreach($paket as $v)
            <div class="package-item">
                <div class="package-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end" style="background-image: url('public/PaketRental/{{$v->foto}}');">
                    </div>
                    <div class="text">
                        <h2 class="mb-0"><a href="#">{{$v->nama_paket}}</a></h2>
                        <div class="d-flex mt-3">
                            <p class="cat" style="color: black;">{{$v->destinasi}}</p>
                            <p class="price ml-auto">Rp. {{$v->harga}},00</p>
                        </div>
                        <p class="d-flex mb-0 d-block">
                            <a href="{{url('customer/detail-paket',$v->id)}}" class="btn btn-primary py-2 mr-1">Booking</a>
                        </p>
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