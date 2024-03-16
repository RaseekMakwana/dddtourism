<?php
$segment1 = request()->segment(1);
$segment2 = request()->segment(2);
$segment3 = request()->segment(3);
?>
@if($data['banner_type'] == 'banner_with_center_content_position')
    @if(!empty($data['banner']))
    <section class="ghoghlabanner slidershow">
        <div class="owl-carousel owl-theme banner-slider">
            @foreach ($data['banner'] as $element)
            <div class="item banner" style="background: url('{{ asset('storage/banner/'.$element->featured_image) }}') 50% 50% no-repeat; background-size: cover;;">
                <div class="container h-100">
                    <div class="row align-items-center h-75">
                        <div class="col-lg-12 col-md-12 col-12 text-center">
                            @if($element->show_text == "Y")
                                <h1 class="my-0">{{ $element->title }}</h1>
                                <h2 class="mt-4">{{ $element->description }}</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
@endif


@if($data['banner_type'] == 'banner_with_left_bottom_content_position')

    @if(!empty($data['banner']))
    <section class="">
        <div class="owl-carousel owl-theme banner-slider">
            @foreach ($data['banner'] as $element)
            <div class="item banner" style="background: url('{{ asset('storage/banner/'.$element->featured_image) }}') 50% 50% no-repeat; background-size: cover;;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12  position-relative col-md-12 col-12">
                            @if($element->show_text == "Y")
                            <h2>{{ $element->title }}<br/><span>{{ $element->description }}</span></h2>
                            @endif
                            {{-- <h2>Pani kotta<br/><span>Popular folk dance of Dadra & Nagar Haveli</span></h2> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
@endif

<section id="skip-to-main-content"></section>
