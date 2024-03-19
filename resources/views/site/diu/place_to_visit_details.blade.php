@extends('site.layouts.master_diu')

@section('title','Diu Events - Welcome')

@section('page_link_and_styles')
@endsection

@section('content')

<section class="info pt-2">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('diu') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('diu/place-to-visit') }}">Places To Visit</a></li>
                    {{-- <li class="breadcrumb-item"><a href="beaches.html">Beaches</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">{{ $data['page_details']->english_title }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <h2>{{ $data['page_details']->english_title }}</h2>
                <p>{!! $data['page_details']->english_sort_content !!}</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-justify">
                {!! $data['page_details']->english_content !!}
            </div>
        </div>
    </div>
</section>
@if(!empty($data['popular_page']))
<section class="popular-beaches">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-3">Popular {{ request()->segment(3) }}</h2>
                <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with beautiful scenery <br />but also the luxury of flawless beaches. </p>
            </div>
        </div>
        <div class="row mt-5 spr">
            @foreach ($data['popular_page'] as $element)
                <div class="col-lg-3 col-md-3 col-12 text-center">
                    <a href="{{ url("diu/place-to-visit/".$element->type."/".$element->slug) }}">
                    <div class="beach hover-animate">
                        <figure style="background: url('{{ asset('storage/place_to_visit/'.$element->featured_image) }}') 50% 50% no-repeat; background-size: cover;">
                            <div class="details">
                                <h3>{{ $element->english_title }}</h3>
                                <p class="small">{!! $element->english_sort_content !!}</p>
                            </div>
                        </figure>
                        <h6>{{ $element->english_title }}</h6>
                    </div>
                </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<section class="tourist-library">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3>Tourist Visual Library</h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4 col-md-4 col-12 px-1">
                <figure style="background: url('{{ asset('assets/site/img/diu-1.jpg') }}') 50% 50% no-repeat; background-size: cover;"></figure>
            </div>
            <div class="col-lg-4 col-md-4 col-12 px-1">
                <figure style="background: url('{{ asset('assets/site/img/diu-2.jpg') }}') 50% 50% no-repeat; background-size: cover;"></figure>
            </div>
            <div class="col-lg-4 col-md-4 col-12 px-1">
                <figure style="background: url('{{ asset('assets/site/img/diu-3.jpg') }}') 50% 50% no-repeat; background-size: cover;"></figure>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <a href="#"  class="link">View All</a>
            </div>
        </div>
    </div>
</section>
<section class="infomain">
    <div class="container">
        <div class="row ">
			<div class="col-lg-11 ml-auto col-md-11 col-12">
                <div class="row bg-black-op">
                    <div class="col-lg-6 pr-lg-0 col-md-6 col-12">
                        <div class="row">
                            <div class="col-lg-12 iframe col-md-12 col-12">
                                <img src="{{ asset('assets/site/img/map-diu.jpg') }}">
                            </div>
                            <div class="col-lg-10 text-center col-md-10 col-12">
                                <p><a href="#">Click Here For Direction</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="section-title white">
                            <h2>Diu</h2>
                            <h6>A Perfect Getaway for Friends & Family</h6>
                            <p class="mb-4">Diu is a beautiful island located nearby the coast of kathiyawad region at veraval port. Diu is more popular as a tourist place because of the natural beaches, Bold History, many other attractions and sightseeing.</p>
                            <p>Area:40.00 Sq. Km</p>
                            <p>Population: 52,074 (As per 2011 Census)</p>
                            <p>Languages Spoken: Gujarati, Marathi, Portuguese, Hindi, and Others</p>
                            <p>Best Time to Visit: Monsoon & Winter</p>
                        </div>
                        <div class="inf">
                            <div class="box">
                                <div class="img"><img src="{{ asset('assets/site/img/icr-1.png') }}" alt="" /></div>
                                <div class="text">By Road</div>
                            </div>
                            <div class="box red">
                                <div class="img"><img src="{{ asset('assets/site/img/icr-2.png') }}" alt="" /></div>
                                <div class="text">By Train</div>
                            </div>
                            <div class="box blue">
                                <div class="img"><img src="{{ asset('assets/site/img/icr-3.png') }}" alt="" /></div>
                                <div class="text">By Air</div>
                            </div>
                            <div class="box green">
                                <div class="img"><img src="{{ asset('assets/site/img/icr-4.png') }}" alt="" /></div>
                                <div class="text">By chopper</div>
                            </div>
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
