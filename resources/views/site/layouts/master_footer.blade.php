<!doctype html>
<html lang="en">

<head>
    @include('site.layouts.includes.header_links')
    @yield('page_link_and_styles')
</head>

<body>

    <div class="side-menu">
        @include('site.layouts.includes.side-manu')
    </div>
    <section class="header">
        @include('site.layouts.includes.header')
    </section>

    @include('site.layouts.includes.banner',$data['banner'])
    @yield('content')

    @include('site.layouts.includes.footer')

    @include('site.layouts.includes.footer_links')

    @yield('page_link_and_javascripts')
</body>

</html>
