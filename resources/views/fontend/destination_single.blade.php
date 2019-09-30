@extends('fontend.layouts.master')
@section('pageTitle') {{ $destination->name }} @endsection
@push('css')
<link href="{{asset('backend/global_assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
@endpush
@section('page-header')
<div class="bg2 overlay" style="background-image: url({{asset('/storage/destination/banner/'.$destination->banner)}});">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
<!--                 <h2><strong>Times to explore</strong></h2>
                <p>Start your new adventure here</p> -->
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- <div class="container row">
	<div class="col-md-12">
		<button class="btn btn-gallery view-destination-img"><img src="{{ asset('fontend/images/image-gallery.png') }}" height="16px" width="16px" /><span style="padding-left: 5px;">View Photos</span></button>
	</div>
</div> -->
</div>
</div>
<br>
<div class="row">
<div id="content12">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				{{-- <div class="col-md-12">
					<span class="state">State > </span><span class="area">Balik Pulau</span>
				</div> --}}
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>{{ $destination->name }}</h3>
				</div>
			</div>
			@if($destination->heading)
			<div class="row">
				<div class="col-md-12">
					<span class="entires text-justiy">{{ $destination->heading }}</span>
				</div>
			</div>
			<br>
			<br>
				@if($destination->short_description)
				<div class="row">
					<div class="col-md-12">
						<h4 class="destination-sub-titles">Description</h4>
					</div>
					<div class="col-md-12">
						<div class="room-detail-desc text-justify">
							{!! $destination->short_description !!}
						</div>
					</div>
				</div>
				<br>
				@endif
			@endif
			<div id="view_more_text" style="display: none;">
			    @if($destination->introduction)
				<div class="row">
					<div class="col-md-12">
						<h4 class="destination-sub-titles">Introduction</h4>
					</div>
					<div class="col-md-12 text-justify">
						{!! $destination->introduction !!}
					</div>
				</div>
				<br>
				@endif
				@if($destination->experience)
				<div class="row">
					<div class="col-md-12">
						<h4 class="destination-sub-titles">Experience</h4>
					</div>
					<div class="col-md-12 text-justify">
						{!! $destination->experience !!}
					</div>
				</div>
				<br>
				@endif
				@if($destination->hotel)
				<div class="row">
					<div class="col-md-12">
						<h4 class="destination-sub-titles">Hotel</h4>
					</div>
					<div class="col-md-12 text-justify">
						{!! $destination->hotel !!}
					</div>
				</div>
				<br>
				@endif
				@if($destination->transportation)
				<div class="row">
					<div class="col-md-12">
						<h4 class="destination-sub-titles">Transportation</h4>
					</div>
					<div class="col-md-12 text-justify">
						{!! $destination->transportation !!}
					</div>
				</div>
				@endif
				@if($destination->culture)
				<div class="row">
					<div class="col-md-12">
						<h4 class="destination-sub-titles">Culture</h4>
					</div>
					<div class="col-md-12 text-justify">
						{!! $destination->culture !!}
					</div>
				</div>
				@endif
			</div>
			<div class="row">
			<div class="col-md-12">
				<p class="btn btn-success" id="view_more">Show More</p>
			</div>
		</div>
		</div>
	</div>
</div>
	@if($related->count() > 0)
<div>
		<section>

			<div id="content3">

				<div class="container">

					<div class="row">

						<div class="col-md-12 headercontent">

							<h4><b>More Trips in {{$destination->heading}}</b></h4>

						</div>

						<div class="col-md-10">

							<p class="p1">Check out More Options</p>

						</div>
						<div class="col-md-2">

							<p class="p1"><a class="views-all-btn flt-right" href="{{ route('destination.index') }}">View All ></a></p>

						</div>
						@foreach ($related as $relate)

							<div class="col-lg-3 col-md-4 col-sm-12 borderimg1">
								<a href="{{ route('destination.show',$relate->id) }}">
									<div class="square">
										<img src="{{asset('/storage/destination/photo/'.$relate->photo)}}" class="img1" width="100%" height="auto" />
									</div>
									<div class="titleimg1">{{$relate->name}}</div>
								</a>
							</div>
						@endforeach

					</div>

				</div>
			</div>
		</section>
	</div>
		@endif
</div>
</div>
@if (count($latest)>0)
<div class="row">
	<div id="content11">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span><h4><b>Popular activities in {{ $destination->name }}</b></h4></span>
				</div>
				@foreach($latest as $hotel)
				<div class="col-lg-3 col-md-6 borderimg1">
					<center>
					<div class="darkbg3">
						<div class="square">
							<img src="{{asset('/storage/hotel/photo/'.$hotel->photo)}}" class="img3" width="100%" height="100%">
						</div>
						<div class="row">
							<div class="col-md-12 titleimg4"><a href="{{ route('hotel.show', $hotel->id) }}">{{ $hotel->name }}</a></div>
							<div class="col-md-7 reviewcontainer">
								<span id="rating_{{ $hotel->id }}"></span>
							</div>
							<div class="col-md-5 price1">MYR {{ $hotel->price }}</div>
						</div>
					</div>
					</center>
				</div>
				@php
				$reviews = $hotel->reviews->where('status', 'approved');
				if($reviews->count() > 0){
				$rating = $reviews->average('rate');
				} else{
				$rating = 0;
				}
				@endphp
				<script>
					$(function () {
					$("#rating_{{ $hotel->id }}").rateYo({
					rating: {{ $rating }},
					readOnly: true
					});
					});
				</script>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endif
@endsection
@push('js')
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('fontend/js/destination-booking.js')}}"></script>
<script src="{{asset('fontend/js/toastr.min.js')}}"></script>
<script>
    $(document).on('click', '#view_more', function(){
        $('#view_more_text').toggle('fade');
        var text = $(this).text();
        if(text == 'Show More'){
            text = 'Show Less';
        } else{
            text = 'Show More'
        }
        $(this).text(text);
    })
</script>
@endpush