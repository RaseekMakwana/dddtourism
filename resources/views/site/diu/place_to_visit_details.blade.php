@extends('site.layouts.master_diu')

@section('title','Places To Visit ')

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


@endsection


@section('page_link_and_javascripts')
@endsection
