@php
$reviews = $packege->reviews->where('status', 'approved');
@endphp
@extends('fontend.layouts.master')
@section('pageTitle') dashboard @endsection
@push('css')
<link href="{{asset('fontend/css/toastr.min.css')}}" rel="stylesheet">
@endpush
@section('page-header')
<!-- <img src="{{asset('fontend/images/bg8.jpg')}}" class="bg1"/> -->
<div class="bg2 overlay" style="background-image: url({{asset('/storage/packege/banner/'.$packege->banner)}});">
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
<!-- <div class="container row">
	<div class="col-md-12">
		<button class="btn btn-gallery view-hotel-img"><img src="{{asset('fontend/images/image-gallery.png')}}" height="16px" width="16px" /><span style="padding-left: 5px;">View Photos</span></button>
	</div>
</div> -->
@endsection
@section('content')
<div class="row">
	<div id="content12">
		<div class="container" style="padding:35px 0;">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
					</div>
					<div class="row">
						<div class="col-md-12">
							<h3>{{$packege->name}}</h3>
						</div>
					</div>
{{--					<div class="row">--}}
{{--						<div class="col-md-12">--}}
{{--							<span class="hotel-review">--}}
{{--								<span class="hotel-review"><span id="rateYo_{{ $packege->id }}"></span><span class="review">&nbsp;&nbsp;{{ $reviews->count() }} review</span></span>--}}
{{--								@if(count($reviews)>0){--}}
{{--									$rating = $reviews->average('rate');--}}
{{--								}--}}
{{--								@else{--}}
{{--									$rating = 0;--}}
{{--								}--}}
{{--								@endif--}}
{{--								<script>--}}
{{--								$(function () {--}}
{{--									$("#rateYo_{{ $packege->id }}").rateYo({--}}
{{--										rating: {{ $rating }},--}}
{{--										readOnly: true--}}
{{--									});--}}
{{--								});--}}
{{--								</script>--}}
{{--							</span>--}}
{{--						</div>--}}
{{--					</div>--}}
					<br>
					<div class="row">
						<div class="col-md-12">
							<span>Duration : </span><span> {{$packege->duration}} hour(s)</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<span>Location : </span><span> {{$packege->destination->name}}</span>
						</div>
					</div>
					@if ($reviews->count() > 0)

			<br>
			<div class="row">
				<div class="col-md-8">
					<h4 class="hotel-sub-titles">Reviews</h4>
				</div>
				<div class="col-md-4">
					<a class="view-more-review">More reviews</a>
				</div>
			</div>
			@foreach($reviews->take(2) as $review)
			<div class="row">
				<div class="review-hotel-container">
					<div class="col-md-2">
						<span>
							<img src="{{asset($review->user->image ?'storage/profile/user/'. $review->user->image : 'fontend/images/profile-pic.png')}}" class="profile-pic-comment" />
						</span>
					</div>
					<div class="col-md-10">
						<div class="comment-name">{{ $review->user->name }}</div>
						<div class="comment-review-star">
							<span id="personal_rate_{{ $review->id }}"></span>&nbsp;&nbsp;{{ $review->created_at->format('Y/m/d') }}</span>
						</div>
						<div class="comment-review-desc">
							{!! $review->review !!}
						</div>
					</div>
				</div>
			</div>
			<br>
			<script>
					$(function () {
						$("#personal_rate_{{ $review->id }}").rateYo({
							rating: {{ $review->rate }},
							readOnly: true
						});
					});
					</script>
			@endforeach
			@endif
				</div>
				<div class="col-md-4 booking-price-container">
					<div>
						<div class="col-md-12" style="padding-bottom: 5px;">
							<img src="{{asset('fontend/images/question-mark.png')}}" />
							Price Guarantee
						</div>
						<div class="col-md-6" style="padding-bottom: 20px;">
							<label>
								Start form
							</label>
						</div>
						<div class="col-md-6" style="padding-bottom: 20px;">
							<span class="price-label" style="float: right;">RM 'Hello'</span>
						</div>
						{{-- <div class="col-md-12" style="padding-bottom: 20px;">
							<a href="{{ route('travelkit') }}" class="btn btn-info btn-book-redirect">Buy Now</a>
						</div> --}}
						<div class="col-md-12" style="padding-bottom: 20px;">
							<p>To be confirmed within 3 working day(s)</p>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div id="package-options-content"></div>
					<br>
					<div class="row">
						<div class="col-md-12 package-options bg-experience">
							<div class="container-fluid">
								<div class="col-md-12">
									<h4 class="hotel-sub-titles">
									Package options
									</h4>
								</div>
								<form action="{{ route('itinaray-up') }}" method="POST" id="">
									@csrf
									<input type="hidden" name="packege_id" value="{{$packege->id}}">
									<div class="col-md-7">







										@foreach($packege->trips as $trip)

										<div class="one-way">
											<div class ="row">
												<b><span class="col-md-8">{{$packege->name}} ({{$trip->name}})</span><span class="price-package">RM{{$trip->price}}</span>
													<span id="ck-button"><label><input type="checkbox" id="one-way-pack" class="hidden" name="one_way" value="1" onclick="showDiv('one-way-pack')" /><span>Select</span></label></span></b>
												<input type="hidden" name="one_price" value="{{$trip->price}}>

											</div>

											<div  id="package-details-container-one" class="row">
												<div class="col-md-6">
													<div><label>Select Depart Date</label></div>
													<div style="padding-bottom: 10px;">
														<input type="date" value="" id="depart-date" class="form-control" min="{{date('Y-m-d')}}" name="depart_date" onchange="getPackageDetail('depart-date')"  />
													</div>
												</div>
												<div class="col-md-6">
												</div>
												<div class="col-md-12">
													<label>Select Pack Quantity</label>
												</div>
												<div class="col-md-6">
													<div style="padding-bottom: 10px;">
														<select id="pack-quantity" class="form-control" name="pack_quantity" onchange="getPackageDetail('pack-quantity')" >
															<option value="">Select Pack Quantity</option>
															@for($i=1; $i <=20; $i++)
																<option>{{$i}}</option>
															@endfor

														</select>
													</div>
												</div>
												<div class="col-md-6">
												</div>
												<div class="panel-group col-md-12">
												@foreach ($trip->days as $day)

													<div class="panel panel-default">
													<div class="col-md-12 panel-heading">
														<p>Day : {{$day->number}}</p>
													</div>

													<div class="panel-body col-md-12">
													@foreach($day->itinaries as $itinary)

													<div class="col-md-3">
														<input type="time" id="time1-0" class="form-control form-control100 itinerary-form1" name="time1[]" value="{{$itinary->time}}" readonly />
													</div>
													<div class="col-md-9">
														<input type="text" id="activity1-0" class="form-control form-control100 itinerary-form1" name="itinary_name1[]" value="{{$itinary->name}}" readonly />
													</div>

													@endforeach
													</div>
													</div>
												@endforeach
												</div>
												<div id="itinerary-container1">
												</div>
												<div class="col-md-3">
													<button type="button" id="edit-itinerary-btn1" class="btn btn-info form-control" name="edit-btn1">Edit</button>
												</div>
												<div class="col-md-3">
													<button type="button" id="add-itinerary-btn1" class="btn btn-info form-control" name="add-btn1">Add</button>
												</div>
												<input type="hidden" id="price-package-select" name="price-package" value="{{$trip->price}}" />
											</div>
										</div>



										@endforeach













{{--										<div class="two-way">--}}
{{--											<div class ="row package-details-two-way">--}}
{{--												<b><span class="col-md-8">{{$packege->name}} (Option 2)</span><span class="price-package">RM{{$packege->two_way_price}}</span>--}}
{{--													<span id="ck-button1"><label><input type="checkbox" id="two-way-pack" class="hidden" name="two-way" value="1" {{old('two-way') ? 'checked' : ''}}  onclick="showDiv('two-way-pack')" /><span>Select</span></label></span></b>--}}
{{--												<input type="hidden" name="two_price" value="{{$packege->two_way_price}}">--}}
{{--											</div>--}}
{{--											<div id="package-details-container-two" class="row">--}}
{{--												<div class="col-md-6">--}}
{{--													<div><label>Select Depart Date</label></div>--}}
{{--													<div style="padding-bottom: 10px;">--}}
{{--														<input type="date" value="{{old('two-way') ? old('depart_date2') : '' }}" id="depart-date2" class="form-control" min="{{date('Y-m-d')}}" name="depart_date2" onchange="getPackageDetail2('depart-date2')"  />--}}
{{--														@if ($errors->has('depart_date2') AND old('two-way'))--}}
{{--															<span class="text-danger">{{ $errors->first('depart_date2') }}</span>--}}
{{--														@endif--}}
{{--													</div>--}}
{{--												</div>--}}
{{--												<div class="col-md-6">--}}
{{--												</div>--}}
{{--												<div class="col-md-12">--}}
{{--													<label>Select Pack Quantity</label>--}}
{{--												</div>--}}
{{--												<div class="col-md-6">--}}
{{--													<div style="padding-bottom: 10px;">--}}
{{--														<select id="pack-quantity2" class="form-control" name="pack_quantity2"  onchange="getPackageDetail2('pack-quantity2')"  >--}}
{{--															<option value="">Select Pack Quantity</option>--}}
{{--															@for($i=1; $i <=20; $i++)--}}
{{--																<option value='{{$i}}' {{ old('two-way') && old('pack_quantity2') == $i ? 'selected' : '' }}>{{$i}}</option>--}}
{{--															@endfor--}}

{{--														</select>--}}
{{--														@if ($errors->has('pack_quantity2') AND old('two-way'))--}}
{{--															<span class="text-danger">{{ $errors->first('pack_quantity2') }}</span>--}}
{{--														@endif--}}
{{--													</div>--}}
{{--												</div>--}}
{{--												<div class="col-md-6">--}}
{{--												</div>--}}
{{--												<div class="col-md-12">--}}
{{--													<p>Your Itinerary :</p>--}}
{{--												</div>--}}
{{--												@foreach ($packege->twoway as $two)--}}
{{--													--}}{{-- expr --}}
{{--													<div class="col-md-3">--}}
{{--														<input type="time" id="time2-0" class="form-control form-control100 itinerary-form2" name="time2[]" value="{{$two->time2}}" readonly />--}}
{{--													</div>--}}
{{--													<div class="col-md-9">--}}
{{--														<input type="text" id="activity2-0" class="form-control form-control100 itinerary-form2" name="itinary_name2[]" value="{{$two->itinary_name2}}" readonly />--}}
{{--													</div>--}}
{{--												@endforeach--}}
{{--												<div id="itinerary-container2">--}}
{{--												</div>--}}
{{--												<div class="col-md-3">--}}
{{--													<button type="button" id="edit-itinerary-btn2" class="btn btn-info form-control" name="edit-btn2">Edit</button>--}}
{{--												</div>--}}
{{--												<div class="col-md-3">--}}
{{--													<button type="button" id="add-itinerary-btn2" class="btn btn-info form-control" name="add-btn2">Add</button>--}}
{{--												</div>--}}
{{--												<input type="hidden" id="price-package-select2" name="price-package" value="500" />--}}
{{--											</div>--}}
{{--										</div>--}}
									</div>
									<div class="col-md-5 booking-price-container">
										<div>
											<div class="col-md-12" style="padding-bottom: 5px;">
												<img src="{{asset('fontend/images/question-mark.png')}}" /><label>&nbsp;Order Details</label>
											</div>
											<div class="col-md-12" style="padding-bottom: 20px;">
												<label><span>{{$packege->name}} </span><span id="option-package-selected"></span></label>
											</div>
											<div class="col-md-12" style="padding-bottom: 20px;">
												<span id="depart-date-txt" class="depart-date-details flt-left" style="float: left;"></span>
											</div>
											<div class="col-md-12">
												<div class="order-details">
													<div id="package-op" class="col-md-5"></div>
													<div id="pack-quantity-txt" class="col-md-3 align-right-col"></div>
													<div id="price-txt" class="col-md-4 align-right-col"></div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="order-total-prices">
													<div class="col-md-6">Total</div>
													<div id="total-price-txt" class="col-md-6 align-right-col"></div>
												</div>
											</div>
											<div class="col-md-12" style="padding-bottom: 20px;">
												<input type="submit" class="btn btn-info btn-book" name="book-btn" value="Book now" />
											</div>
											<div class="col-md-12" style="padding-bottom: 10px;">
												<p>To be confirmed within 3 working day(s)</p>
											</div>
											<div class="col-md-12">
												<button type="button" class="wishlist-btn" data-id="{{$packege->id}}" data-url="{{ route('user.wishlist') }}"> Add to Wishlists</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="col-md-7" style="padding-top: 50px;">
					<div class="row">
						<div class="col-md-12">
							<h4 class="hotel-sub-titles">Description</h4>
						</div>
						<div class="col-md-12">
							{!! $packege->description  !!}
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<h4 class="hotel-sub-titles">Inclusive of</h4>
						</div>
						<div class="col-md-12">
							{!!$packege->inclusive_of !!}
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<h4 class="hotel-sub-titles">Not inclusive of</h4>
						</div>
						<div class="col-md-12">
							{!! $packege->not_inclusive_of !!}
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<h4 class="hotel-sub-titles">Booking information</h4>
						</div>
						<div class="col-md-12">
							{!! $packege->booking_info!!}
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<h4 class="hotel-sub-titles">Map</h4>
						</div>
						<div class="col-md-12">
							{{$packege->destination->name}}
						</div>
						<div class="col-md-12">
							{!! $packege->location !!}
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<h4 class="hotel-sub-titles">Cancellation Policy</h4>
						</div>
						<div class="col-md-12">
							{!! $packege->policy !!}
						</div>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</div>
</div>
<hr>
@if (count($latest)>0)
<div class="row">
	<div id="content11">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<span><h4><b>More place you may like</b></h4></span>
			</div>
			@foreach($latest as $hotel)
			<div class="col-lg-3 col-md-6 borderimg1">
				<center>
				<div class="darkbg3">
					<div class="square">
						<img src="{{asset('/storage/hotel/photo/'.$hotel->photo)}}" class="img3"/ width="100%" height="100%">
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
<script type="text/javascript" src="{{asset('fontend/js/experience-booking.js')}}"></script>
<script src="{{asset('fontend/js/toastr.min.js')}}"></script>
<script>
        @if ($errors->any())

            @foreach ($errors->all() as $error)

                toastr.error('{{$error}}');

            @endforeach

    @endif
{{--    @if(old('one_way'))--}}
{{--        showDiv('one-way-pack')--}}
{{--        @if(old('depart_date'))--}}
{{--        getPackageDetail('depart-date')--}}
{{--        @endif--}}
{{--        @if(old('pack_quantity'))--}}
{{--        getPackageDetail('pack-quantity')--}}
{{--        @endif--}}
{{--    @elseif(old('two-way'))--}}
{{--    showDiv('two-way-pack')--}}
{{--    @if(old('depart_date2'))--}}
{{--    getPackageDetail2('depart-date2')--}}
{{--    @endif--}}
{{--    @if(old('pack_quantity2'))--}}
{{--    getPackageDetail2('pack-quantity2')--}}
{{--    @endif--}}
{{--	@elseif(old('three-way'))--}}
{{--	showDiv('three-way-pack')--}}
{{--		@if(old('depart_date3'))--}}
{{--		getPackageDetail3('depart-date3')--}}
{{--		@endif--}}
{{--		@if(old('pack_quantity3'))--}}
{{--		getPackageDetail3('pack-quantity3')--}}
{{--	@endif--}}
{{--	@elseif(old('four-way'))--}}
{{--	showDiv('four-way-pack')--}}
{{--		@if(old('depart_date4'))--}}
{{--		getPackageDetail4('depart-date4')--}}
{{--		@endif--}}
{{--		@if(old('pack_quantity4'))--}}
{{--		getPackageDetail4('pack-quantity4')--}}
{{--	@endif--}}
{{--	@elseif(old('five-way'))--}}
{{--	showDiv('five-way-pack')--}}
{{--		@if(old('depart_date5'))--}}
{{--		getPackageDetail5('depart-date5')--}}
{{--		@endif--}}
{{--		@if(old('pack_quantity5'))--}}
{{--		getPackageDetail5('pack-quantity5')--}}
{{--	@endif--}}
{{--	@elseif(old('six-way'))--}}
{{--	showDiv('six-way-pack')--}}
{{--		@if(old('depart_date6'))--}}
{{--		getPackageDetail6('depart-date6')--}}
{{--		@endif--}}
{{--		@if(old('pack_quantity6'))--}}
{{--		getPackageDetail6('pack-quantity6')--}}
{{--	@endif--}}
{{--    @elseif(old('seven-way'))--}}
{{--    showDiv('seven-way-pack')--}}
{{--        @if(old('depart_date7'))--}}
{{--        getPackageDetail7('depart-date7')--}}
{{--        @endif--}}
{{--        @if(old('pack_quantity7'))--}}
{{--        getPackageDetail7('pack-quantity7')--}}
{{--        @endif--}}
{{--        @elseif(old('eight-way'))--}}
{{--        showDiv('eight-way-pack')--}}
{{--        @if(old('depart_date8'))--}}
{{--        getPackageDetail8('depart-date8')--}}
{{--        @endif--}}
{{--        @if(old('pack_quantity8'))--}}
{{--        getPackageDetail8('pack-quantity8')--}}
{{--        @endif--}}
{{--        @elseif(old('nine-way'))--}}
{{--        showDiv('nine-way-pack')--}}
{{--        @if(old('depart_date9'))--}}
{{--        getPackageDetail9('depart-date9')--}}
{{--        @endif--}}
{{--        @if(old('pack_quantity9'))--}}
{{--        getPackageDetail9('pack-quantity9')--}}
{{--    @endif--}}
{{--    @endif--}}
</script>
@endpush