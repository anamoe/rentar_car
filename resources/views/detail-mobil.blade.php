@extends('layouts-user.master')
@section('content')
<section class="ftco-section ftco-car-details">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="car-details">
					<div class="img rounded" style="background-image: url('../../public/mobil/{{$mobil->foto}}');"></div>
					<div class="text text-center">
						<span class="subheading" style="font-size: large;">{{$mobil->merk}} - {{$mobil->model}} - {{$mobil->tahun}}</span>
						<h2>Harga Sewa :Rp. {{$mobil->biaya_total}},00</h2>
					</div>
				</div>
			</div>
		</div>

		<div class="row" style="background-color: #fffff0;">
			<div class="col-md-12 pills">
				<div class="bd-example bd-example-tabs">
					<div class="d-flex justify-content-center">
						<ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">

							<li class="nav-item">
								<a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true" style="font-size: 30px;">Fitur</a>
							</li>

						</ul>
					</div>

					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
							<div class="row">
								<div class="col-md-4">
									<ul class="features">
										<li class="check"><span class="ion-ios-checkmark"></span>Airconditions</li>
										<li class="check"><span class="ion-ios-checkmark"></span>Child Seat</li>
										<li class="check"><span class="ion-ios-checkmark"></span>GPS</li>
										<li class="check"><span class="ion-ios-checkmark"></span>Luggage</li>
										<li class="check"><span class="ion-ios-checkmark"></span>Music</li>
									</ul>
								</div>
								<div class="col-md-4">
									<ul class="features">
										<li class="check"><span class="ion-ios-checkmark"></span>Seat Belt</li>
										<li class="remove"><span class="ion-ios-close"></span>Sleeping Bed</li>
										<li class="check"><span class="ion-ios-checkmark"></span>Water</li>
										<li class="check"><span class="ion-ios-checkmark"></span>Bluetooth</li>
										<li class="remove"><span class="ion-ios-close"></span>Onboard computer</li>
									</ul>
								</div>
								<div class="col-md-4">
									<ul class="features">
										<li class="check"><span class="ion-ios-checkmark"></span>Audio input</li>
										<li class="check"><span class="ion-ios-checkmark"></span>Long Term Trips</li>
										<li class="check"><span class="ion-ios-checkmark"></span>Car Kit</li>
										<li class="check"><span class="ion-ios-checkmark"></span>Remote central locking</li>
										<li class="check"><span class="ion-ios-checkmark"></span>Climate control</li>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<center>
	<label for="" style="font-weight:bold;color:black">FORM BOOKING - RENTAL</label>

</center>

<div class="row m-4 justify-content-center" style="margin: 30px;">
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	{{ session('success') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
	<div class="col-md-12 block-9 mb-md-5">
		<form action="{{url('customer/create-transaksi-paket')}}" method="post" class="p-5 contact-form" style="background-color:blue;">
			@csrf
			<input type="hidden" class="form-control" name="mobil_id" value="{{$mobil->id}}" placeholder="">

			<label for="" style="font-weight:600;color:#fffff0">Data Paket</label>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="">Mulai Tanggal</label>
						<input type="date" class="form-control" name="tanggal_penjemputan" placeholder="" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="">Jam Penjemputan</label>
						<input type="time" class="form-control" name="jam_penjemputan" placeholder="" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="">Alamat Penjemputan</label>
						<input type="text" class="form-control" name="alamat_penjemputan" placeholder="" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="">Pembayaran</label>
						<input type="text" disabled class="form-control" value="Rp.{{$mobil->biaya_total}},00">
						<input type="hidden" class="form-control" name="pembayaran" placeholder="" value="{{$mobil->biaya_total}}">
					</div>
				</div>
			</div>
			<br>
			<label for="" style="font-weight:600;color:#fffff0">Data Wisatawan</label>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" class="form-control" disabled name="" placeholder="" value="{{$customer->name}}">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" disabled name="" placeholder="" value="{{$customer->email}}">
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						<label for="">No telepon Aktif</label>
						<input type="text" class="form-control" disabled name="phone" placeholder="" value="{{$customer->phone}}">
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label for="">Umur</label>
						<input type="number" class="form-control" disabled name="umur" placeholder="" value="{{$customer->umur}}">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="">Alamat</label>
						<input type="text" class="form-control" disabled name="address" placeholder="" value="{{$customer->address}}">
					</div>
				</div>

			</div>
			<br>
			<button type="submit" class="btn btn-success py-2 px-5 text-center">Kirim</button>
		</form>

	</div>
</div>
@endsection