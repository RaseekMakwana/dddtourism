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
                        <li class="breadcrumb-item active" aria-current=""><a href="{{ url("diu/media-gallery") }}">Gallery</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $photo_gallery->english_title }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5 col-md-11 col-12 title2 mbs text-center">
                    <h2>{{ $photo_gallery->english_title }}</h2>
                </div>
            </div>
            <div class="row">
                @if(!empty($photo_gallery_details))
                @foreach ($photo_gallery_details as $element)
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="gallerybox">
                            <a href="{{ asset('storage/photo-gallery/'.$element->slug.'/'.$element->filename) }}" data-fancybox="gallery">
                                <figure style="background: url('{{ asset('storage/photo-gallery/'.$element->slug.'/'.$element->filename) }}') 50% 50% no-repeat; background-size: cover;"></figure>
                            </a>
                        </div>
                    </div>
                @endforeach

                @endif
            </div>
        </div>
    </section>

@endsection


@section('page_link_and_javascripts')
<script>
    Fancybox.bind("[data-fancybox]", {
  // Your custom options
});
</script>
@endsection
