@php
    $segment1 = request()->segment(1);
    $segment3 = request()->segment(3);
@endphp

@if($segment3 == "hotels")
    <div class="head">Hotel Registration Form</div>
@endif
<a href="{{ url($segment1.'/facilities/hotels') }}">
    <div class="iconbox pink">
        <div class="img">
            <img src="{{ url('assets/site/img/iconfest-3.png') }}" alt="">
        </div>
        <span>Hotels</span>
    </div>
</a>

<a href="{{ url($segment1.'/facilities/bars-and-liquor-shops') }}">
<div class="iconbox">
    <div class="img">
        <img src="{{ url('assets/site/img/iconfest-1.png') }}" alt="">
    </div>
    <span>Bars and Liquor Shops</span>
</div>
</a>

<a href="{{ url($segment1.'/facilities/hospitals') }}">
<div class="iconbox green">
    <div class="img">
        <img src="{{ url('assets/site/img/iconfest-2.png') }}" alt="">
    </div>
    <span>Hospitals</span>
</div>
</a>

<a href="{{ url($segment1.'/facilities/tents') }}">
<div class="iconbox lightgreen">
    <div class="img">
        <img src="{{ url('assets/site/img/iconfest-6.png') }}" alt="">
    </div>
    <span>tent</span>
</div>
</a>

<a href="{{ url($segment1.'/facilities/petrol-pump') }}">
<div class="iconbox lightpink">
    <div class="img">
        <img src="{{ url('assets/site/img/iconfest-5.png') }}" alt="">
    </div>
    <span>petrol pumps</span>
</div>
</a>

<a href="{{ url($segment1.'/facilities/parking-places') }}">
<div class="iconbox orange">
    <div class="img">
        <img src="{{ url('assets/site/img/iconfest-4.png') }}" alt="">
    </div>
    <span>Parking Places</span>
</div>
</a>

<a href="{{ url($segment1.'/facilities/public-toilets') }}">
<div class="iconbox lightgreen">
    <div class="img">
        <img src="{{ url('assets/site/img/iconfest-7.png') }}" alt="">
    </div>
    <span>public toilets</span>
</div>
</a>

<a href="{{ url($segment1.'/facilities/sport-facilities') }}">
<div class="iconbox orange">
    <div class="img">
        <img src="{{ url('assets/site/img/iconfest-9.png') }}" alt="">
    </div>
    <span>sports facilities</span>
</div>
</a>

<a href="{{ url($segment1.'/facilities/rent-a-bicycle') }}">
<div class="iconbox green">
    <div class="img">
        <img src="{{ url('assets/site/img/iconfest-11.png') }}" alt="">
    </div>
    <span>rent a cycle</span>
</div>
</a>

<a href="{{ url($segment1.'/facilities/public-wifi') }}">
<div class="iconbox lightpink">
    <div class="img">
        <img src="{{ url('assets/site/img/iconfest-8.png') }}" alt="">
    </div>
    <span>public wifi </span>
</div>
</a>

<a href="{{ url($segment1.'/facilities/rent-a-bike') }}">
<div class="iconbox pink">
    <div class="img">
        <img src="{{ url('assets/site/img/iconfest-10.png') }}" alt="">
    </div>
    <span>rent a bike</span>
</div>
</a>

<a href="{{ url($segment1.'/facilities/e-bus-schedule') }}">
<div class="iconbox">
    <div class="img">
        <img src="{{ url('assets/site/img/iconfest-12.png') }}" alt="">
    </div>
    <span>e-bus schedule</span>
</div>
</a>
