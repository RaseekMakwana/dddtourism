@extends('site.layouts.master1')

@section('title','Diu Events - Welcome')

@section('page_link_and_styles')
@endsection

@section('content')
<section class="popular-beaches pltovisit pt-2">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb" class="ml-auto">
                <ol class="breadcrumb mb-0 pb-0" style="background: none;">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Places To Visit </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-11 col-12 title2 black mbs">
                <h2>{{ $data['beaches']->title }}</h2>
                <p>{{ strip_tags($data['beaches']->description) }} </p>
            </div>
        </div>
        <div class="row mt-4 spr">
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <div class="beach hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['ghoghla_beach']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['ghoghla_beach']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <div class="beach hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['nagoa_beach']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['nagoa_beach']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <div class="beach hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['gomtimata_beach']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['gomtimata_beach']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['chakratirth_beach']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['chakratirth_beach']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['jallandhar_beachx']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['jallandhar_beachx']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="popular-beaches pltovisit pt-5 pb-4 bg2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 title2 mbs">
                <h2>{{ $data['forest']->title }}</h2>
                <p>{{ strip_tags($data['forest']->description) }} </p>
            </div>
        </div>
        <div class="row mtts spr">
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['diu_fort']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['diu_fort']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['fortress_of_panikotha']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['fortress_of_panikotha']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="popular-beaches pltovisit pt-5 bg3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 title2 mbs">
                <h2>{{ $data['churches']->title }}</h2>
                <p>{{ strip_tags($data['churches']->description) }} </p>
            </div>
        </div>
        <div class="row mts spr pb-4">
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['st_paul_church']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['st_paul_church']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['st_francis_of_assisi_church']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['st_francis_of_assisi_church']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="popular-beaches pltovisit pt-5 bg4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 title2 mbs">
                <h2>{{ $data['diu_museums']->title }}</h2>
                <p>{{ strip_tags($data['diu_museums']->description) }} </p>
            </div>
        </div>
        <div class="row mts spr">
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['st_paul_church1']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['st_paul_church1']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['st_francis_of_assisi_church1']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['st_francis_of_assisi_church1']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="infoship bg5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="logoins">
                    <img src="{{ asset('assets/site/img/logo-ins.png') }}" alt="" />
                    <h3>INS KHUKRI<br/><span>‘BAL, SAHAS, JOSH AUR DUM, KHUKRI NAHI KISSI SE KAM’</span></h3>
                </div>
            </div>
            <div class="col-lg-12 mts d-flex justify-content-end col-md-12 col-12">
                <div class="altext">
                    <div class="logocount">
                        <h4>125</h4>
                        <h5>thousand <br/> delighted <br/> visitor</h5>
                    </div>
                    <span class="hline">Visit battle ship to know more</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="popular-beaches pltovisit pt-5 bg6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 title2 mbs">
                <h2>{{ $data['water_sport']->title }}</h2>
                <p>{{ strip_tags($data['water_sport']->description) }} </p>
            </div>
        </div>
        <div class="row mt-4 pt-2 spr">
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <div class="beach hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['scuba_diving']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['scuba_diving']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <div class="beach hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['wind_surfing']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['wind_surfing']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <div class="beach hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['water_scooter']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['water_scooter']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['desert_bike']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['desert_bike']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/pages/'.$data['water_skiing']->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['water_skiing']->english_title }}</h3>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="popular-beaches pltovisit pt-5 bg7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 title2 mbs">
                <h2>{{ $data['bird_sanctuary']->title }}</h2>
                <p>{{ strip_tags($data['bird_sanctuary']->description) }} <br/>
                <a class="lir" href="#">View All</a></p>
            </div>
        </div>
        <div class="row mt-4 pt-2">
            <div class="col-lg-10 col-md-10 ml-auto col-12 text-right">
                <img src="{{ asset('assets/site/img/img-rec.png') }}" alt="" />
            </div>
        </div>
    </div>
</section>
<section class="popular-beaches pltovisit forest bg8">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center col-md-12 col-12 title2 white">
                <div class="bgs">
                    <h2>{{ $data['forest1']->title }}</h2>
                    <p>{!! $data['forest1']->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('page_link_and_javascripts')
@endsection
