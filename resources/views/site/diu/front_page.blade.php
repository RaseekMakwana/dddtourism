@php
    $segment1 = request()->segment(1);
    $segment3 = request()->segment(3);
@endphp

@extends('site.layouts.master_diu')

@section('title', 'Diu Events - Welcome')

@section('page_link_and_styles')
@endsection

@section('content')

<section class="explorebuttons">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 inf text-center col-md-12 col-12">
                <h4>Explore DNH & DD</h4>
                <ul>
                    <li><a href="#">Daman</a></li>
                    <li><a href="#">Diu</a></li>
                    <li><a href="#">DNH</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="info">
    <div class="container">
        <div class="row">
			<div class="col-lg-5 img text-center col-md-5 col-12">
                <img src="{{ asset('storage/posts/'.$data['intro']->featured_image) }}" alt=""/>
                <h4>Shri. Praful Patel</h4>
                <h6>Hon'ble Administrator<br/>
                    <span>UT Administration of Dadra and Nagar<br/> Haveli and Daman and Diu</span>
                </h6>
            </div>
			<div class="col-lg-7 col-md-7 col-12">
                <h3>{{ $data['intro']->english_title }}</h3>
                {!! $data['intro']->english_content !!}
                <a class="readmore" href="{{ url('diu/content/'.$data['intro']->slug) }}">Read More</a>
            </div>
        </div>
    </div>
</section>
@if(!empty($data['top_attraction']))
<section class="attraction homi">
    <div class="container">
        <div class="row justify-content-center">
			<div class="col-lg-11 col-md-12 col-12">
                <div class="row">
                    <div class="col-lg-12  col-md-12 col-12">
                        <div class="section-title white">
                            <h2>Top Attractions </h2>
                            <h6>Uncover The Tourists' Paradise </h6>
                        </div>
                    </div>
                </div>
                <div class="row spr">
                    @foreach ($data['top_attraction'] as $element)
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="card attraction-card hover-animate">
                                <div class="img">
                                    <img class="w-100" src="{{ asset('storage/top_attraction/'.$element->featured_image) }}" alt="" />
                                </div>
                                <div class="text">
                                    <h4>{{ $element->english_title }}<br/><span>“{{ $element->english_sort_content }}”</span></h4>
                                    {!! $element->english_content !!}
                                    <a class="read" href="{{ route('site.diu.content.details',['slug'=>$element->slug,'type'=>'top-attraction']) }}">Read More</a>
                                    <div class="down">
                                        <div class="social">
                                            <a href="#" target="_blank"><img src="{{ asset('assets/site/img/icon-1-fb.png') }}" alt="" /></a>
                                            <a href="#" target="_blank"><img src="{{ asset('assets/site/img/icon-2.png') }}" alt="" /></a>
                                            <a href="#" target="_blank"><img src="{{ asset('assets/site/img/icon-3.png') }}" alt="" /></a>
                                        </div>
                                        <div class="rt ml-auto">
                                            <h3>{{ $element->english_tag }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<section class="facility">
    <div class="container">
        <div class="row">
			<div class="col-lg-12 text-center col-md-12 col-12">
                <div class="section-title">
                    <h2>Facilities Available</h2>
                    <h6>We Make Your Comfortable</h6>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
			<div class="col-lg-10 col-md-12 col-12">
                <div class="row spr align-items-center">
                    <div class="col-lg-3 col-md-3 col-12">
                        <a href="{{ url($segment1.'/facilities/bars-and-liquor-shops') }}">
                        <div class="iconbox">
                            <div class="img">
                                <img src="{{ asset('assets/site/img/iconfest-1.png') }}" alt="" />
                            </div>
                            <span>Bars and Liquor Shops</span>
                        </div>
                        </a>
                        <a href="{{ url($segment1.'/facilities/hospitals') }}">
                        <div class="iconbox green">
                            <div class="img">
                                <img src="{{ asset('assets/site/img/iconfest-2.png') }}" alt="" />
                            </div>
                            <span>Hospitals</span>
                        </div>
                        </a>
                        <a href="{{ url($segment1.'/facilities/hotels') }}">
                        <div class="iconbox pink">
                            <div class="img">
                                <img src="{{ asset('assets/site/img/iconfest-3.png') }}" alt="" />
                            </div>
                            <span>Hotels</span>
                        </div>
                        </a>
                        <a href="{{ url($segment1.'/facilities/parking-places') }}">
                        <div class="iconbox orange">
                            <div class="img">
                                <img src="{{ asset('assets/site/img/iconfest-4.png') }}" alt="" />
                            </div>
                            <span>Parking Places</span>
                        </div>
                        </a>
                        <a href="{{ url($segment1.'/facilities/petrol-pump') }}">
                        <div class="iconbox lightpink">
                            <div class="img">
                                <img src="{{ asset('assets/site/img/iconfest-5.png') }}" alt="" />
                            </div>
                            <span>Petrol Pumps</span>
                        </div>
                        </a>
                        <a href="{{ url($segment1.'/facilities/tents') }}">
                        <div class="iconbox lightgreen">
                            <div class="img">
                                <img src="{{ asset('assets/site/img/iconfest-6.png') }}" alt="" />
                            </div>
                            <span>tent</span>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-6 text-center col-md-6 col-12">
                        <img class="w-100" src="{{ asset('') }}assets/site/img/img-festival.png" />
                    </div>
                    <div class="col-lg-3 rt col-md-3 col-12">
                        <a href="{{ url($segment1.'/facilities/public-toilets') }}">
                        <div class="iconbox lightgreen">
                            <div class="img">
                                <img src="{{ asset('assets/site/img/iconfest-7.png') }}" alt="" />
                            </div>
                            <span>public toilets</span>
                        </div>
                        </a>
                        <a href="{{ url($segment1.'/facilities/public-wifi') }}">
                        <div class="iconbox lightpink">
                            <div class="img">
                                <img src="{{ asset('assets/site/img/iconfest-8.png') }}" alt="" />
                            </div>
                            <span>public wifi </span>
                        </div>
                        </a>
                        <a href="{{ url($segment1.'/facilities/sport-facilities') }}">
                        <div class="iconbox orange">
                            <div class="img">
                                <img src="{{ asset('assets/site/img/iconfest-9.png') }}" alt="" />
                            </div>
                            <span>sports facilities</span>
                        </div>
                        </a>
                        <a href="{{ url($segment1.'/facilities/rent-a-bike') }}">
                        <div class="iconbox pink">
                            <div class="img">
                                <img src="{{ asset('assets/site/img/iconfest-10.png') }}" alt="" />
                            </div>
                            <span>rent a bike</span>
                        </div>
                        </a>
                        <a href="{{ url($segment1.'/facilities/rent-a-bicycle') }}">
                        <div class="iconbox green">
                            <div class="img">
                                <img src="{{ asset('assets/site/img/iconfest-11.png') }}" alt="" />
                            </div>
                            <span>rent a cycle</span>
                        </div>
                        </a>
                        <a href="{{ url($segment1.'/facilities/e-bus-schedule') }}">
                        <div class="iconbox">
                            <div class="img">
                                <img src="{{ asset('assets/site/img/iconfest-12.png') }}" alt="" />
                            </div>
                            <span>e-bus schedule</span>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('site.layouts.includes.diu.map')
<section class="placetovisit homi">
    <img class="al" src="assets/site/img/artplace.png" alt="" />
    <div class="container">
        <div class="row justify-content-center">
			<div class="col-lg-11 col-md-12 col-12">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="section-title">
                            <h2>Place to Visit</h2>
                            <h6>A Perfect Getaway for Friends & Family</h6>
                        </div>
                        <a class="infs green" href="#">
                            <h3>St Paul’s Church</h3>
                            <p>The Church of Immaculate Conception</p>
                            <p class="sm">This magnificent building of Gothic architecture <br/>
                                was built by the Portuguese. </p>
                            <div class="link" href="#">View More</div>
                        </a>
                    </div>
                    <div class="col-lg-6 text-center col-md-6 col-12">
                        <div class="position-relative boxcontent d-inline-block">
                            <a href="#" class="boxes ft">
                                <div class="bgs">
                                    <span>ST paul's<br/>Church</span>
                                </div>
                                <img class="img" src="{{ asset('assets/site/img/place-1.png') }}" alt="" />
                            </a>
                            <a href="#" class="boxes f2">
                                <div class="bgs">
                                    <span>ST paul's<br/>Church</span>
                                </div>
                                <img class="img" src="{{ asset('assets/site/img/place-2.png') }}" alt="" />
                            </a>
                            <a href="#" class="boxes f3">
                                <div class="bgs">
                                    <span>ST paul's<br/>Church</span>
                                </div>
                                <img class="img" src="{{ asset('assets/site/img/place-5.png') }}" alt="" />
                            </a>
                            <a href="#" class="boxes sd">
                                <div class="bgs">
                                    <span>ST paul's<br/>Church</span>
                                </div>
                                <img class="img" src="{{ asset('assets/site/img/place-4.png') }}" alt="" />
                            </a>
                            <a href="#" class="boxes f4">
                                <div class="bgs">
                                    <span>ST paul's<br/>Church</span>
                                </div>
                                <img class="img" src="{{ asset('assets/site/img/place-3.png') }}" alt="" />
                            </a>
                            <a href="#" class="boxes f5">
                                <div class="bgs">
                                    <span>ST paul's<br/>Church</span>
                                </div>
                                <img class="img" src="{{ asset('assets/site/img/place-6.png') }}" alt="" />
                            </a>
                            <a href="#" class="boxes td">
                                <div class="bgs">
                                    <span>ST paul's<br/>Church</span>
                                </div>
                                <img class="img" src="{{ asset('assets/site/img/place-7.png') }}" alt="" />
                            </a>
                        </div>
                        <!-- <img src="assets/site/img/imgbeachnew.png" alt="" /> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="onlinebooking">
    <div class="container">
        <div class="row justify-content-center">
			<div class="col-lg-11 col-md-12 col-12">
                <div class="row">
                    <div class="col-lg-6 col-md-5 col-12">
                        <img src="{{ asset('assets/site/img/logo-khush.png') }}" alt="" />
                        <div class="logos mt-4">
                            <img src="{{ asset('assets/site/img/img125.png') }}" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-6 spr col-md-7 col-12">
                        <div class="bgs">
                            <form>
                                <div class="row">
                                    <div class="col-lg-12 text-center col-md-12 col-12">
                                        <h3>Online Booking</h3>
                                        <h4>Pride of Indian Navy History - Visit INS Khukri </h4>
                                        <h5>Maximum 30 Members at a Time and the Visit <br/> Duration within Warship is 30 Mins</h5>
                                        <p>Timing 8:00 AM to 8:00 PM<br/> Entry Fees Rs.100 Adults  Rs.50 Children (3 Yrs to 10 Yrs)  </p>
                                    </div>
                                </div>
                                <div class="row spr">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="date" class="form-control" placeholder="Select Date" />
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <select class="form-control" >
                                            <option>Select Time Slot</option>
                                            <option>Select Time Slot</option>
                                            <option>Select Time Slot</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="whitebox">
                                            <span>Add Adult Members</span>
                                            <div class="topping-add">
                                                <a href="#" class="item-desc"><img src="{{ asset('assets/site/img/icon-minus.png') }}"></a>
                                                <input type="text" value="1" class="item-qty">
                                                <a href="#" class="item-inc"><img src="{{ asset('assets/site/img/icon-plus.png') }}"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="whitebox">
                                            <span>Add Childrens</span>
                                            <div class="topping-add">
                                                <a href="#" class="item-desc"><img src="{{ asset('assets/site/img/icon-minus.png') }}"></a>
                                                <input type="text" value="1" class="item-qty">
                                                <a href="#" class="item-inc"><img src="{{ asset('assets/site/img/icon-plus.png') }}"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="whitebox">
                                            <span>Adult Members</span>
                                            <span class="rt">
                                                <em><img src="{{ asset('assets/site/img/icon-money.png') }}" alt="" /></em>
                                                0.00
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="whitebox">
                                            <span>Childrens</span>
                                            <span class="rt">
                                                <em><img src="{{ asset('assets/site/img/icon-money.png') }}" alt="" /></em>
                                                0.00
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="whitebox">
                                            <span>total</span>
                                            <span class="rt">
                                                <em><img src="{{ asset('assets/site/img/icon-money.png') }}" alt="" /></em>
                                                0.00
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center col-md-12 col-12">
                                        <button type="submit" class="submit">Pay now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('page_link_and_javascripts')
@endsection
