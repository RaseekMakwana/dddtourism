@php
    $sagment1 = request()->segment(1);
    $sagment2 = request()->segment(2);
    $sagment3 = request()->segment(3);

@endphp

<!-- Brand Logo -->
<a class="brand-link bg-lightblue">
    <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><b>Diu </b>Admin</span>
</a>

<!-- Sidebar -->
<div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('admin/dashboard') }}" class="nav-link {{ ($sagment1 == "dashboard")? "active" : ""  ;  }}">
                    <i class="fas fa-circle nav-icon"></i>
                    <p> Dashboard </p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ url('admin/categories') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p> Categories </p>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{ url('admin/posts') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p> Posts </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/pages') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p> Pages </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/place-to-visit') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p> Place To Visit </p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ url('admin/banner') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p> Banners</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link {{ (in_array($sagment3,['hospital','bars-and-liquor-shops','parking-slot','petrol-pump','public-toilet','public-wifi','sport-facility','rent-a-bike','rent-a-bicycle'])? "active" : "" )  }}">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Facilities
                  </p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('admin/hotel') }}" class="nav-link {{ ($sagment2 == "hotel")? "active" : ""  ;  }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Hotels</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/tent') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tents</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/facilities/hospital') }}" class="nav-link {{ ($sagment3 == "hospital")? "active" : ""  ;  }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Hospital</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/facilities/bars-and-liquor-shops') }}" class="nav-link {{ ($sagment3 == "bars-and-liquor-shops")? "active" : ""  ;  }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Bars And Liquor Shop</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/facilities/parking-place') }}" class="nav-link {{ ($sagment3 == "parking-slot")? "active" : ""  ;  }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Parking Place</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/facilities/petrol-pump') }}" class="nav-link {{ ($sagment3 == "petrol-pump")? "active" : ""  ;  }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Petrol Pump</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/facilities/public-toilet') }}" class="nav-link {{ ($sagment3 == "public-toilet")? "active" : ""  ;  }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Public Toilet</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/facilities/public-wifi') }}" class="nav-link {{ ($sagment3 == "public-wifi")? "active" : ""  ;  }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Public Wifi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/facilities/sport-facility') }}" class="nav-link {{ ($sagment3 == "sport-facility")? "active" : ""  ;  }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sport Facility</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/facilities/rent-a-bike') }}" class="nav-link {{ ($sagment3 == "rent-a-bike")? "active" : ""  ;  }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Rent a Bike</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/facilities/rent-a-bicycle') }}" class="nav-link {{ ($sagment3 == "rent-a-bicycle")? "active" : ""  ;  }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Rent a Bicycle</p>
                    </a>
                  </li>
                </ul>
              </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
