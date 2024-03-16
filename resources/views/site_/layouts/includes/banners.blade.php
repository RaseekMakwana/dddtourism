<?php
$segment1 = request()->segment(1);
$segment2 = request()->segment(2);
$segment3 = request()->segment(3);

if (empty($data['banners'])) {
    $bannerseResult = DB::table('posts')->where('category_id', '8')->get();
} else {
    $bannerseResult = $data['banners'];
}

if(in_array($segment1,['diu','daman','dnh']) && empty($segment2)){
    $bannersType = 1;
} else {
    $bannersType = 2;
}

?>

@if($bannersType == '1')
<section class="">
    <div class="owl-carousel owl-theme banners-slider">
        @if (!empty($bannerseResult))
            @foreach ($bannerseResult as $element)
        <div class="item banners" style="background: url({{ url('storage/posts/'.$element->featured_image) }}) 50% 50% no-repeat; background-size: cover;;">
            <div class="container opacity-0">
                <div class="row">
                    <div class="col-lg-12 logo text-center col-md-12 col-12">
                        <a class="" href="#"><img src="assets/img/logo-g20.png" alt=""/></a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12">
                        <h2>Diu Events<br/><span>Popular folk dance of DNH & DD	</span></h2>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</section>
@endif

@if($bannersType == '2')
<section class="slidershow">
    <div class="owl-carousel owl-theme banners-slider">
        @if (!empty($bannerseResult))
            @foreach ($bannerseResult as $element)
            <div class="item banners" style="background: url({{ url('storage/posts/'.$element->featured_image) }}) 50% 50% no-repeat; background-size: cover;;">
                <div class="container h-100 opacity-0">
                    <div class="row align-items-center h-75">
                        <div class="col-lg-12 col-md-12 col-12 text-center">
                            <h1 class="my-0">Diu</h1>
                            <h2 class="mt-4">Place to Visit</h2>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</section>
@endif


<section id="skip-to-main-content"></section>
