<div class="bgs">
    @if (Request::segment(1) == "diu")
        <ul class="main-menu zindex">
            <li class=""><a href="{{ url('/') }}"><img src="{{ asset('assets/site/img/menu-icon-1.png') }}" alt="" /> HOME</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-2.png') }}" alt="" /> ABOUT DIU</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-3.png') }}" alt="" /> ABOUT DEPARTMENT</a></li>
            <li class=""><a href="{{ url('diu/place-to-visit') }}"><img src="{{ asset('assets/site/img/menu-icon-4.png') }}" alt="" /> PLACES TO VISIT</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-5.png') }}" alt="" /> INS KHUKARI</a></li>
            <li class=""><a href="{{ url('diu/facilities') }}"><img src="{{ asset('assets/site/img/menu-icon-6.png') }}" alt="" /> FACILITES</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-7.png') }}" alt="" /> EVENTS</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-8.png') }}" alt="" /> TENDER/CIRCULARS</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-9.png') }}" alt="" /> MEDIA GALLERY</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-10.png') }}" alt="" /> CITIZEN CORNER</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-11.png') }}" alt="" /> CONTACT US</a></li>
        </ul>
    @else
        <ul class="main-menu zindex">
            <li class=""><a href="{{ url('/') }}"><img src="{{ asset('assets/site/img/menu-icon-1.png') }}" alt="" /> HOME</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-2.png') }}" alt="" /> ABOUT DIU</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-3.png') }}" alt="" /> ABOUT DEPARTMENT</a></li>
            <li class=""><a href="{{ url('place-to-visit') }}"><img src="{{ asset('assets/site/img/menu-icon-4.png') }}" alt="" /> PLACES TO VISIT</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-5.png') }}" alt="" /> INS KHUKARI</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-6.png') }}" alt="" /> FACILITES</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-7.png') }}" alt="" /> EVENTS</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-8.png') }}" alt="" /> TENDER/CIRCULARS</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-9.png') }}" alt="" /> MEDIA GALLERY</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-10.png') }}" alt="" /> CITIZEN CORNER</a></li>
            <li class=""><a href="#"><img src="{{ asset('assets/site/img/menu-icon-11.png') }}" alt="" /> CONTACT US</a></li>
        </ul>
    @endif
</div>
