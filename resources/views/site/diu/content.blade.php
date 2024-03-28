@php
    $segment1 = request()->segment(1);
    $segment4 = request()->segment(4);
@endphp

@extends('site.layouts.master_diu')

@section('title', $data['detail']->english_title)

@section('page_link_and_styles')
@endsection

@section('content')

    <section class="info">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2>{{ $data['detail']->english_title }}</h2>
                </div>
                <div class="col-lg-12 img text-center col-md-12 col-12 mb-5">
                    @if($segment4 == "post")
                        <img src="{{ asset('storage/posts/' . $data['detail']->featured_image) }}" alt="" />
                    @elseif($segment4 == "top-attraction")
                        <img src="{{ asset('storage/top_attraction/' . $data['detail']->featured_image) }}" alt="" />
                    @endif
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 text-justify">
                    {!! $data['detail']->english_content !!}
                </div>
            </div>
        </div>
    </section>

@endsection


@section('page_link_and_javascripts')
@endsection
