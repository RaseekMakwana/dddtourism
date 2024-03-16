@extends('site.layouts.master')

@section('title', 'E-Bus Schedule | Facilities')

@section('page_link_and_styles')
@endsection

@section('content')

<section class="info-common hotel">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 pb-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="facilities.html">Facilities</a></li>
                    <li class="breadcrumb-item active" aria-current="page">E-Bus Schedule</li>
                </ol>
            </nav>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-5 col-md-11 col-12 title2 mbs text-center">
                <h2>E-Bus Schedule</h2>
                <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with beautiful scenery but also the luxury of flawless beaches. </p>
            </div>
        </div>
        <div class="row justify-content-center">
			<div class="col-lg-9 pr-lg-5 col-md-8 col-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                    5 Star
                                    <span>
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                    4 Star
                                    <span>
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contacti" role="tab" aria-controls="contact" aria-selected="false">
                                    3 Star
                                    <span>
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact2-tab" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="false">
                                    Homestay
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="col-lg-12 mt-3 mb-3 p-0 pb-1 pt-2 col-md-12 col-12">
                            <p>28 Hotels in Diu</p>
                        </div>
                        <div class="row bgs pink">
                            <div class="col-lg-5 img col-md-5 col-12">
                                <figure style="background: url({{ url('assets/site/img/hotel-1.png') }}) 50% 50% no-repeat; background-size: cover;">
                                </figure>
                            </div>
                            <div class="col-lg-7 rt col-md-7 col-12">
                                <span class="stars">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                </span>
                                <h4>Radhika Beach<br> Resort and Spa</h4>
                                <p>"Wonderful experience with Wonderful staff facilities especially tithi mam ! The room and breakfast facilities were great with different facilities like swimming pool and game zone etc ."</p>
                                <p class="lbtns">
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-1.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-2.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-3.png') }}" alt=""></a>
                                </p>
                                <a class="rulesbtn" href="#">Show Rates</a>
                                <a class="vlocation" href="#"><img src="{{ url('assets/site/img/icon-map-pink.png') }}" alt=""> <span>View Location</span></a>
                            </div>
                        </div>
                        <div class="row bgs blue">
                            <div class="col-lg-5 img col-md-5 col-12">
                                <figure style="background: url({{ url('assets/site/img/hotel-2.png') }}) 50% 50% no-repeat; background-size: cover;">
                                </figure>
                            </div>
                            <div class="col-lg-7 rt col-md-7 col-12">
                                <span class="stars">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                </span>
                                <h4>The Deltin</h4>
                                <p>"Wonderful experience with Wonderful staff facilities especially tithi mam ! The room and breakfast facilities were great with different facilities like swimming pool and game zone etc ."</p>
                                <p class="lbtns">
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-1.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-2.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-3.png') }}" alt=""></a>
                                </p>
                                <a class="rulesbtn" href="#">Show Rates</a>
                                <a class="vlocation" href="#"><img src="assets/img/icon-map-bluenew.png" alt=""> <span>View Location</span></a>
                            </div>
                        </div>
                        <div class="row bgs green">
                            <div class="col-lg-5 img col-md-5 col-12">
                                <figure style="background: url({{ url('assets/site/img/hotel-3.png') }}) 50% 50% no-repeat; background-size: cover;">
                                </figure>
                            </div>
                            <div class="col-lg-7 rt col-md-7 col-12">
                                <span class="stars">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                </span>
                                <h4>Devka Beach <br> Resort</h4>
                                <p>"Wonderful experience with Wonderful staff facilities especially tithi mam ! The room and breakfast facilities were great with different facilities like swimming pool and game zone etc ."</p>
                                <p class="lbtns">
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-1.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-2.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-3.png') }}" alt=""></a>
                                </p>
                                <a class="rulesbtn" href="#">Show Rates</a>
                                <a class="vlocation" href="#"><img src="assets/img/icon-map-green.png" alt=""> <span>View Location</span></a>
                            </div>
                        </div>
                        <div class="row bgs dgreen">
                            <div class="col-lg-5 img col-md-5 col-12">
                                <figure style="background: url({{ url('assets/site/img/hotel-4.png') }}) 50% 50% no-repeat; background-size: cover;">
                                </figure>
                            </div>
                            <div class="col-lg-7 rt col-md-7 col-12">
                                <span class="stars">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                </span>
                                <h4>The Gold Beach <br> Resort</h4>
                                <p>"Wonderful experience with Wonderful staff facilities especially tithi mam ! The room and breakfast facilities were great with different facilities like swimming pool and game zone etc ."</p>
                                <p class="lbtns">
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-1.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-2.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-3.png') }}" alt=""></a>
                                </p>
                                <a class="rulesbtn" href="#">Show Rates</a>
                                <a class="vlocation" href="#"><img src="assets/img/icon-map-dgreen.png" alt=""> <span>View Location</span></a>
                            </div>
                        </div>
                        <div class="row bgs lpink">
                            <div class="col-lg-5 img col-md-5 col-12">
                                <figure style="background: url({{ url('assets/site/img/hotel-5.png') }}) 50% 50% no-repeat; background-size: cover;">
                                </figure>
                            </div>
                            <div class="col-lg-7 rt col-md-7 col-12">
                                <span class="stars">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                </span>
                                <h4>The Fern Seaside Luxurious  <br> Tent Resort – Diu</h4>
                                <p>"Wonderful experience with Wonderful staff facilities especially tithi mam ! The room and breakfast facilities were great with different facilities like swimming pool and game zone etc ."</p>
                                <p class="lbtns">
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-1.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-2.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-3.png') }}" alt=""></a>
                                </p>
                                <a class="rulesbtn" href="#">Show Rates</a>
                                <a class="vlocation" href="#"><img src="{{ url('assets/site/img/icon-map-pink.png') }}" alt=""> <span>View Location</span></a>
                            </div>
                        </div>
                        <div class="row bgs lorange">
                            <div class="col-lg-5 img col-md-5 col-12">
                                <figure style="background: url({{ url('assets/site/img/hotel-6.png') }}) 50% 50% no-repeat; background-size: cover;">
                                </figure>
                            </div>
                            <div class="col-lg-7 rt col-md-7 col-12">
                                <span class="stars">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                </span>
                                <h4>Mirasol Resort</h4>
                                <p>"Wonderful experience with Wonderful staff facilities especially tithi mam ! The room and breakfast facilities were great with different facilities like swimming pool and game zone etc ."</p>
                                <p class="lbtns">
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-1.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-2.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-3.png') }}" alt=""></a>
                                </p>
                                <a class="rulesbtn" href="#">Show Rates</a>
                                <a class="vlocation" href="#"><img src="assets/img/icon-map-lorange.png" alt=""> <span>View Location</span></a>
                            </div>
                        </div>
                        <div class="row bgs llpink">
                            <div class="col-lg-5 img col-md-5 col-12">
                                <figure style="background: url({{ url('assets/site/img/hotel-7.png') }}) 50% 50% no-repeat; background-size: cover;">
                                </figure>
                            </div>
                            <div class="col-lg-7 rt col-md-7 col-12">
                                <span class="stars">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                    <img src="{{ url('assets/site/img/star-yellow.png') }}" alt="">
                                </span>
                                <h4>Hotel The Grand Highness</h4>
                                <p>"Wonderful experience with Wonderful staff facilities especially tithi mam ! The room and breakfast facilities were great with different facilities like swimming pool and game zone etc ."</p>
                                <p class="lbtns">
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-1.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-2.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ url('assets/site/img/icon-hotel-3.png') }}" alt=""></a>
                                </p>
                                <a class="rulesbtn" href="#">Show Rates</a>
                                <a class="vlocation" href="#"><img src="{{ url('assets/site/img/icon-map-pink.png') }}" alt=""> <span>View Location</span></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 pagi pink mt-0 mb-4 col-md-12 col-12">
                                <ul>
                                    <li><a class="active" href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    </div>
                    <div class="tab-pane fade" id="contacti" role="tabpanel" aria-labelledby="contact-tab">

                    </div>
                    <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab">

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-12">
                @include('site.facilities.side_manu')
            </div>
        </div>
    </div>
</section>

@endsection


@section('page_link_and_javascripts')
@endsection
