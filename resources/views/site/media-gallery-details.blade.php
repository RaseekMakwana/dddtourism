@php
    $photo_gallery = $data['photo_gallery'];
    $photo_gallery_details = $data['photo_gallery_details'];
@endphp

@extends('site.layouts.master_diu')

@section('title', 'Media Gallery')

@section('page_link_and_styles')
@endsection

@section('content')

    <section class="info-common gallery">
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 pb-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $photo_gallery->english_title }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5 col-md-11 col-12 title2 mbs text-center">
                    <h2>Gallery</h2>
                    <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with beautiful
                        scenery but also the luxury of flawless beaches. </p>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12 btns-green col-md-12 col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">
                                Photo Gallery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">
                                Video Gallery
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row sppr" id="photo_gallery_html">
                            </div>
                            <div class="row">
                                <div class="col-lg-12 pagi grey mt-3 col-md-12 col-12">
                                    <ul id="photo_gallery_pagination">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row sppr" id="video_gallery_html">

                            </div>
                            <div class="row">
                                <div class="col-lg-12 pagi grey mt-3 col-md-12 col-12">
                                    <ul id="video_gallery_pagination">
                                    </ul>
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
