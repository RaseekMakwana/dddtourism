@extends('site.layouts.master')

@section('title', 'Facilities - Diu')

@section('page_link_and_styles')
@endsection

@section('content')

    <section class="info facilities pt-2">
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Facilities</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <h2>facilities</h2>
                    <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with beautiful
                        scenery <br>but also the luxury of flawless beaches. </p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4 col-md-4 col-12 text-center px-2 py-2">
                    <a href="{{ url('diu/facilities/hotels') }}" class="card"
                        style="background: url({{ url('assets/site/img/pic-hotel.jpg') }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="card-details">
                            <img src="{{ url('assets/site/img/icon-hotels.png') }}">
                            <h2>Hotels</h2>
                            <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with
                                beautiful scenery but also the luxury of flawless beaches. </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-12 text-center px-2 py-2">
                    <a href="{{ url('diu/facilities/hospitals') }}" class="card"
                        style="background: url({{ url('assets/site/img/facility-2.png') }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="card-details">
                            <img src="{{ url('assets/site/img/icon-facility-2.png') }}">
                            <h2>Hospitals</h2>
                            <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with
                                beautiful scenery but also the luxury of flawless beaches. </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-12 text-center px-2 py-2">
                    <a href="{{ url('diu/facilities/bars-and-liquor-shops') }}" class="card"
                        style="background: url({{ url('assets/site/img/facility-3.png') }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="card-details">
                            <img src="{{ url('assets/site/img/icon-facility-3.png') }}">
                            <h2>Liquor Shops</h2>
                            <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with
                                beautiful scenery but also the luxury of flawless beaches. </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-12 text-center px-2 py-2">
                    <a href="{{ url('diu/facilities/parking-places') }}" class="card"
                        style="background: url({{ url('assets/site/img/facility-4.png') }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="card-details">
                            <img src="{{ url('assets/site/img/icon-facility-4.png') }}">
                            <h2>Parking Slot</h2>
                            <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with
                                beautiful scenery but also the luxury of flawless beaches. </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-12 text-center px-2 py-2">
                    <a href="{{ url('diu/facilities/petrol-pump') }}" class="card"
                        style="background: url({{ url('assets/site/img/facility-5.png') }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="card-details">
                            <img src="{{ url('assets/site/img/icon-facility-5.png') }}">
                            <h2>Petrol Pump</h2>
                            <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with
                                beautiful scenery but also the luxury of flawless beaches. </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-12 text-center px-2 py-2">
                    <a href="{{ url('diu/facilities/public-toilets') }}" class="card"
                        style="background: url({{ url('assets/site/img/facility-6.png') }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="card-details">
                            <img src="{{ url('assets/site/img/icon-facility-6.png') }}">
                            <h2>Public Toilets</h2>
                            <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with
                                beautiful scenery but also the luxury of flawless beaches. </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-12 text-center px-2 py-2">
                    <a href="{{ url('diu/facilities/public-wifi') }}" class="card"
                        style="background: url({{ url('assets/site/img/facility-7.png') }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="card-details">
                            <img src="{{ url('assets/site/img/icon-facility-7.png') }}">
                            <h2>Free Public Wifi</h2>
                            <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with
                                beautiful scenery but also the luxury of flawless beaches. </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-12 text-center px-2 py-2">
                    <a href="{{ url('diu/facilities/sport-facilities') }}" class="card"
                        style="background: url({{ url('assets/site/img/facility-8.png') }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="card-details">
                            <img src="{{ url('assets/site/img/icon-facility-8.png') }}">
                            <h2>Sport Facilities</h2>
                            <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with
                                beautiful scenery but also the luxury of flawless beaches. </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-12 text-center px-2 py-2">
                    <a href="{{ url('diu/facilities/rent-a-bike') }}" class="card"
                        style="background: url({{ url('assets/site/img/facility-9.png') }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="card-details">
                            <img src="{{ url('assets/site/img/icon-facility-9.png') }}">
                            <h2>Rent a Bike</h2>
                            <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with
                                beautiful scenery but also the luxury of flawless beaches. </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-12 text-center px-2 py-2">
                    <a href="{{ url('diu/facilities/rent-a-bicycle') }}" class="card"
                        style="background: url({{ url('assets/site/img/facility-10.png') }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="card-details">
                            <img src="{{ url('assets/site/img/icon-facility-10.png') }}">
                            <h2>Rent a Bicycle</h2>
                            <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with
                                beautiful scenery but also the luxury of flawless beaches. </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-12 text-center px-2 py-2">
                    <a href="{{ url('diu/facilities/tent') }}" class="card"
                        style="background: url({{ url('assets/site/img/facility-11.png') }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="card-details">
                            <img src="{{ url('assets/site/img/icon-facility-11.png') }}">
                            <h2>Tent</h2>
                            <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with
                                beautiful scenery but also the luxury of flawless beaches. </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-12 text-center px-2 py-2">
                    <a href="{{ url('diu/facilities/e-bus-schedule') }}" class="card"
                        style="background: url({{ url('assets/site/img/facility-12.png') }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="card-details">
                            <img src="{{ url('assets/site/img/icon-facility-12.png') }}">
                            <h2>E-Bus Schedule</h2>
                            <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with
                                beautiful scenery but also the luxury of flawless beaches. </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('page_link_and_javascripts')
@endsection
