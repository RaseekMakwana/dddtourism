@extends('site.layouts.master_only_header_footer')

@section('title','About - Diu')

@section('page_link_and_styles')
@endsection

@section('content')

<section class="about-diu">
    <div class="container">
        <div class="row">
            <div class="col-12 mbs text-center">
                <h2>About Diu</h2>
                <p>Diu is a beautiful island located nearby the coast of kathiyawad region at veraval port. Diu is more popular as a tourist place because of the natural beaches, Bold History, many other attractions and sightseeing. </p>
            </div>
        </div>

        @if(!empty($data['posts']))
            @php $i=0; $j=1; @endphp
            @foreach($data['posts'] as $element)
                @if ($i % 2 == 0)
                <div class="row bgs {{ "t".$j++ }}">
                    <div class="col-lg-4 order-lg-2 order-md-2 img col-md-4 col-12">
                        <img src="{{ asset('storage/posts/'.$element->featured_image) }}" alt="" />
                    </div>
                    <div class="col-lg-8 order-lg-1 order-md-1 col-md-8 col-12">
                        @if(app()->getLocale() == 'en')
                            <h3>{{ $element->english_title }}</h3>
                        @elseif (app()->getLocale() == 'gu')
                            <h3>{{ $element->gujarati_title }}</h3>
                        @elseif (app()->getLocale() == 'hi')
                            <h3>{{ $element->hindi_title }}</h3>
                        @endif
                        @if(app()->getLocale() == 'en')
                            <p>{!! $element->english_content !!}</p>
                        @elseif (app()->getLocale() == 'gu')
                            <p>{!! $element->gujarati_content !!}</p>
                        @elseif (app()->getLocale() == 'hi')
                            <p>{!! $element->hindi_content !!}</p>
                        @endif


                    </div>
                </div>
                @else
                <div class="row bgs {{ "t".$j++ }}">
                    <div class="col-lg-4 img col-md-3 col-12">
                        <img src="{{ asset('storage/posts/'.$element->featured_image) }}" alt="" />
                    </div>
                    <div class="col-lg-8 col-md-9 col-12">
                        @if(app()->getLocale() == 'en')
                            <h3>{{ $element->english_title }}</h3>
                        @elseif (app()->getLocale() == 'gu')
                            <h3>{{ $element->gujarati_title }}</h3>
                        @elseif (app()->getLocale() == 'hi')
                            <h3>{{ $element->hindi_title }}</h3>
                        @endif
                        @if(app()->getLocale() == 'en')
                            <p>{!! $element->english_content !!}</p>
                        @elseif (app()->getLocale() == 'gu')
                            <p>{!! $element->gujarati_content !!}</p>
                        @elseif (app()->getLocale() == 'hi')
                            <p>{!! $element->hindi_content !!}</p>
                        @endif
                    </div>
                </div>
                @endif
                @php $i++; @endphp
            @endforeach
        @endif
    </div>
</section>

@endsection


@section('page_link_and_javascripts')
@endsection
