@extends('site.layouts.master_diu')

@section('title','Places To Visit - Diu')

@section('page_link_and_styles')
@endsection

@section('content')
<section class="popular-beaches pltovisit pt-2">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb" class="ml-auto">
                <ol class="breadcrumb mb-0 pb-0" style="background: none;">
                    <li class="breadcrumb-item"><a href="{{ url('diu') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Places To Visit </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-11 col-12 title2 black mbs">
                <h2>{{ $data['beaches_box']->english_title }}</h2>
                <p>{{ strip_tags($data['beaches_box']->english_content) }} </p>
            </div>
        </div>
        <div class="row mt-4 spr">
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Beaches'][0]->type."/".$data['Beaches'][0]->slug) }}">
                <div class="beach hover-animate">
                    <figure style="background: url({{ asset('storage/place_to_visit/'.$data['Beaches'][0]->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Beaches'][0]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Beaches'][1]->type."/".$data['Beaches'][1]->slug) }}">
                <div class="beach hover-animate">
                    <figure style="background: url({{ asset('storage/place_to_visit/'.$data['Beaches'][1]->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Beaches'][1]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Beaches'][2]->type."/".$data['Beaches'][2]->slug) }}">
                <div class="beach hover-animate">
                    <figure style="background: url('{{ asset('storage/place_to_visit/'.$data['Beaches'][2]->featured_image) }}') 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Beaches'][2]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Beaches'][3]->type."/".$data['Beaches'][3]->slug) }}">
                <div class="beach half hover-animate">
                    <figure style="background: url('{{ asset('storage/place_to_visit/'.$data['Beaches'][3]->featured_image) }}') 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Beaches'][3]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Beaches'][4]->type."/".$data['Beaches'][4]->slug) }}">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/place_to_visit/'.$data['Beaches'][4]->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Beaches'][4]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="popular-beaches pltovisit pt-5 pb-4 bg2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 title2 mbs">
                <h2>{{ $data['forts_box']->english_title }}</h2>
                <p>{{ strip_tags($data['forts_box']->english_content) }} </p>
            </div>
        </div>
        <div class="row mtts spr">
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Forts'][0]->type."/".$data['Forts'][0]->slug) }}">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/place_to_visit/'.$data['Forts'][0]->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Forts'][0]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Forts'][1]->type."/".$data['Forts'][1]->slug) }}">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/place_to_visit/'.$data['Forts'][1]->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Forts'][1]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="popular-beaches pltovisit pt-5 bg3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 title2 mbs">
                <h2>{{ $data['churches_box']->english_title }}</h2>
                <p>{{ strip_tags($data['churches_box']->english_content) }} </p>
            </div>
        </div>
        <div class="row mts spr pb-4">
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Churches'][0]->type."/".$data['Churches'][0]->slug) }}">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/place_to_visit/'.$data['Churches'][0]->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Churches'][0]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Churches'][1]->type."/".$data['Churches'][1]->slug) }}">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/place_to_visit/'.$data['Churches'][1]->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Churches'][1]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="popular-beaches pltovisit pt-5 bg4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 title2 mbs">
                <h2>{{ $data['museums_box']->english_title }}</h2>
                <p>{{ strip_tags($data['museums_box']->english_content) }} </p>
            </div>
        </div>
        <div class="row mts spr">
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Diu Museums'][0]->type."/".$data['Diu Museums'][0]->slug) }}">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/place_to_visit/'.$data['Diu Museums'][1]->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Diu Museums'][1]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Diu Museums'][1]->type."/".$data['Diu Museums'][1]->slug) }}">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/place_to_visit/'.$data['Diu Museums'][1]->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Diu Museums'][1]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
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
                <h2>{{ $data['water_sport_box']->english_title }}</h2>
                <p>{{ strip_tags($data['water_sport_box']->english_content) }} </p>
            </div>
        </div>
        <div class="row mt-4 pt-2 spr">
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Water Sport'][0]->type."/".$data['Water Sport'][0]->slug) }}">
                <div class="beach hover-animate">
                    <figure style="background: url({{ asset('storage/place_to_visit/'.$data['Water Sport'][0]->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Water Sport'][0]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Water Sport'][1]->type."/".$data['Water Sport'][1]->slug) }}">
                <div class="beach hover-animate">
                    <figure style="background: url({{ asset('storage/place_to_visit/'.$data['Water Sport'][1]->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Water Sport'][1]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Water Sport'][2]->type."/".$data['Water Sport'][2]->slug) }}">
                <div class="beach hover-animate">
                    <figure style="background: url({{ asset('storage/place_to_visit/'.$data['Water Sport'][2]->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Water Sport'][2]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Water Sport'][3]->type."/".$data['Water Sport'][3]->slug) }}">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/place_to_visit/'.$data['Water Sport'][3]->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Water Sport'][3]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <a href="{{ url("diu/place-to-visit/".$data['Water Sport'][4]->type."/".$data['Water Sport'][4]->slug) }}">
                <div class="beach half hover-animate">
                    <figure style="background: url({{ asset('storage/place_to_visit/'.$data['Water Sport'][4]->featured_image) }}) 50% 50% no-repeat; background-size: cover;">
                        <div class="details">
                            <h3>{{ $data['Water Sport'][4]->english_title }}</h3>
                        </div>
                    </figure>
                </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="popular-beaches pltovisit pt-5 bg7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 title2 mbs">
                <h2>{{ $data['Other'][0]->english_title }}</h2>
                <p>{{ strip_tags($data['Other'][0]->english_content) }} <br/>
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
                    <h2>{{ $data['Other'][1]->english_title }}</h2>
                    <p>{!! $data['Other'][1]->english_content !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('page_link_and_javascripts')
@endsection
