<div class="container">
        <div class="row justify-content-center">
			<div class="col-lg-12 xs-center p-0 col-md-12 col-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="navbar-brand">
                        @if (Request::segment(1) == "diu")
    						<a class="logo" href="{{ url('diu') }}"><img src="{{ asset('assets/site/img/logo.png') }}" alt=""/></a>
                        @else
	    					<a class="logo" href="{{ url('/') }}"><img src="{{ asset('assets/site/img/logo.png') }}" alt=""/></a>
                        @endif
					</div>
                    <button class="navbar-toggler menu-icon" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""></span>
                        <span class=""></span>
                        <span class=""></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="screen-reader-access.html">SCREEN READER ACCESS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#skip-to-main-content" onclick="skipToMainContent()">SKIP TO MAIN CONTENT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="site-map.html">SITE MAP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
									LANGUAGES
								</a>
								<ul class="dropdown-menu sub-menu">
									{{-- <li><a href="javascript:void(0)" onclick="preferredSiteLanguage('en')">ENGLISH</a></li>
									<li><a href="javascript:void(0)" onclick="preferredSiteLanguage('hi')">HINDI</a></li>
									<li><a href="javascript:void(0)" onclick="preferredSiteLanguage('gu')">GUJARATI</a></li> --}}
									<li><a href="{{ url('preferred-site-language/en') }}">ENGLISH</a></li>
									<li><a href="{{ url('preferred-site-language/hi') }}">HINDI</a></li>
									<li><a href="{{ url('preferred-site-language/gu') }}">GUJARATI</a></li>
								</ul>
							</li>
                            <li class="nav-item">
                                <form>
                                    <div class="searchform">
                                        <input type="text" placeholder="Search" />
                                        <button type="submit" class="search"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </li>
                            <li class="nav-item lang fts">
                                <a class="nav-link" href="#">A-</a>
                            </li>
                            <li class="nav-item lang">
                                <a class="nav-link" href="#">A</a>
                            </li>
                            <li class="nav-item lang lts">
                                <a class="nav-link" href="#">A+</a>
                            </li>
                            <li class="nav-item cbox pink">
                                <a class="nav-link" href="#"></a>
                            </li>
                            <li class="nav-item cbox black">
                                <a class="nav-link" href="#"></a>
                            </li>
                            <li class="nav-item mlast">
                                <a class="nav-link" id="menu-btn"><img src="{{ asset('assets/site/img/menubtn.png') }}" alt="" /></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
