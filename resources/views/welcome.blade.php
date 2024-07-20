@extends('layouts-user.master')
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
      <div class="hero-wrap ftco-degree-bg" style="background-image: url('mobil/{{ $v->foto }}');" data-stellar-background-ratio="0.5">
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
    		<div class="row">
    			<div class="col-md-12">
    				<div class="carousel-car owl-carousel">
						@foreach($mobil as $v)
    					<div class="item">
    						<div class="car-wrap rounded ftco-animate">
								<div class="img rounded d-flex align-items-end" style="background-image: url('mobil/{{$v->foto}}');">

		    					</div>
		    					<div class="text">
		    						<h2 class="mb-0"><a href="#">{{$v->merk}}</a></h2>
		    						
		    						<p class="d-flex mb-0 d-block"><a href="{{url('detail-mobil',$v->id)}}" class="btn btn-primary py-2 mr-1">Book now</a> <a href="#" class="btn btn-secondary py-2 ml-1">Details</a></p>
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
            <h2 class="mb-2">BERBAGAI PILIHAN MOBIL</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="carousel-car owl-carousel">
						@foreach($mobil as $v)
    					<div class="item">
    						<div class="car-wrap rounded ftco-animate">
								<div class="img rounded d-flex align-items-end" style="background-image: url('mobil/{{$v->foto}}');">

		    					</div>
		    					<div class="text">
		    						<h2 class="mb-0"><a href="#">{{$v->merk}}</a></h2>
		    						<div class="d-flex mb-3">
			    						<span class="cat">{{$v->model}}</span>
			    						<p class="price ml-auto">{{$v->tahun}}</p>
		    						</div>
		    						<p class="d-flex mb-0 d-block"><a href="{{url('detail-mobil',$v->id)}}" class="btn btn-primary py-2 mr-1">Book now</a> <a href="#" class="btn btn-secondary py-2 ml-1">Details</a></p>
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