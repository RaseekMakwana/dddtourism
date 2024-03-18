@extends('site.layouts.master')

@section('title', 'Screen Reader Access')

@section('page_link_and_styles')
@endsection

@section('content')

<section class="contact-info pt-2">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 pb-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9 mb-5 col-md-11 col-12 title2 mbs text-center">
                <h2>Contact Us</h2>
                <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with beautiful scenery but also the luxury of flawless beaches. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 lts col-md-6 col-12">
                <h3 class="mt-0 blue">Diu Tourism Department</h3>
                <div class="d-flex contact-details">
                    <img src="{{ asset('assets/site/img/icon-map-blue.png') }}">
                    <p>Tourism Department, <br/> Behind OIDC Housing Complex,<br/> Gandhipara, Diu - 362520</p>
                </div>
                <div class="d-flex contact-details">
                    <img src="{{ asset('assets/site/img/icon-email-blue.png') }}">
                    <p><a href="mailto:tourism-diu-dd@nic.in">tourism-diu-dd@nic.in</a></p>
                </div>
                <div class="d-flex contact-details">
                    <img src="{{ asset('assets/site/img/icon-phone-blue.png') }}">
                    <p><a href="tel:02875-252653">02875-252653</a></p>
                </div>
                <h3>Daman Tourism Department</h3>
                <div class="d-flex contact-details">
                    <img src="{{ asset('assets/site/img/icon-map-grey.png') }}">
                    <p>O/o Director (Tourism), DNH & DD<br/> Department of Tourism, Paryatan Bhavan,<br/> Near Bus Stand, Nani Daman 396 210</p>
                </div>
                <div class="d-flex contact-details">
                    <img src="{{ asset('assets/site/img/icon-email-grey.png') }}">
                    <p><a href="mailto:tourism-dmn-dd@nic.in">tourism-dmn-dd@nic.in</a>, <a href="mailto:dnhddtourism@gmail.com">dnhddtourism@gmail.com</a></a></p>
                </div>
                <div class="d-flex contact-details">
                    <img src="{{ asset('assets/site/img/icon-phone-grey.png') }}">
                    <p><a href="tel:0260 2250002">0260 2250002</a></p>
                </div>
                <h3>DNH Tourism Department</h3>
                <div class="d-flex contact-details">
                    <img src="{{ asset('assets/site/img/icon-map-grey.png') }}">
                    <p>Dept. of Tourism, <br/> Kala Kendra, Silvassa,<br/> DNH - 396230</p>
                </div>
                <div class="d-flex contact-details">
                    <img src="{{ asset('assets/site/img/icon-email-grey.png') }}">
                    <p><a href="mailto:tourism_dmn_dd@nic.in">tourism_dmn_dd@nic.in</a></p>
                </div>
                <div class="d-flex contact-details">
                    <img src="{{ asset('assets/site/img/icon-phone-grey.png') }}">
                    <p><a href="tel:0260 2250002">(0260) 2250002</a></p>
                </div>
            </div>
            <div class="col-lg-6 img col-md-6 col-12">
                <img src="{{ asset('assets/site/img/img-map.png') }}" alt="" />
            </div>
        </div>
    </div>
</section>

@endsection


@section('page_link_and_javascripts')


@endsection
