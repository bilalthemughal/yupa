@extends('fontend.layouts.master')

@section('pageTitle') Satys For You @endsection

@push('css')

@endpush

@section('page-header')
<!-- 
<img src="{{asset('fontend/images/bg8.jpg')}}" class="bg1"/>

<div class="centered3 titleimg9">

    <h2>Stays For You</h2>

</div> -->
<div class="bg2 overlay" style="background-image: url(https://yupa.asia/public/fontend/images/bg8.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <h2><strong>Stays for you</strong></h2>
                <!-- <p>Start your new adventure here</p> -->
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>


@endsection

@section('content')

@if($hotels->count() > 0)

<div class="row">

    <div id="content6">

        <div class="container">

            <div class="row">

                <div class="col-md-12 headercontent">

                    <h4><b>Stays for you</b></h4>

                </div>

                <div class="col-md-10">

                    <p class="p1">Make sure you don't miss out any attractive hotspot nearby your destination</p>

                </div>

                @foreach($hotels as $hotel)

                <div class="col-lg-3 col-md-6 borderimg1">

                    <center>

                    <div class="darkbg3">

                        <img src="{{asset('/storage/hotel/photo/'.$hotel->photo)}}" height="250px" width="250px" class="img3"/>

                        <div class="row">

                            <div class="col-md-12 titleimg4"><a href="{{ route('hotel.show', $hotel->id) }}">{{ $hotel->name }}</a></div>

                            <div class="col-md-7 reviewcontainer">

                                <span id="rateYo_{{ $hotel->id }}"></span>

                            </div>

                            <div class="col-md-5 price1">MYR {{ $hotel->price }}</div>

                        </div>

                    </div>

                    </center>

                </div>

                @php

                $reviews = $hotel->reviews->where('status', 'approved');

                if($reviews->count()){

                    $rating = $reviews->average('rate');

                } else{

                    $rating = 0;

                }

                @endphp

                <script>

                    $(function () {

                      $("#rateYo_{{ $hotel->id }}").rateYo({

                        rating: {{ $rating }},

                        readOnly: true

                      });

                    });

                </script>

                @endforeach

            </div>

            <div class="row">

                {!! $hotels->links() !!}

            </div>

        </div>

    </div>

</div>

@else

<div class="row">

    <div id="content6">

        <div class="container">

            <div class="row">

                <div class="col-md-12 headercontent">

                    <h4><b>Stays for you</b></h4>

                </div>

                <div class="col-md-10">

                    <p class="p1">Make sure you don't miss out any attractive hotspot nearby your destination</p>

                        <h3>No Hotel Found</h3>

                </div>



                </div>

            <div class="row">

                {!! $hotels->links() !!}

            </div>

        </div>

    </div>

</div>

@endif



@endsection

@push('js')

@endpush