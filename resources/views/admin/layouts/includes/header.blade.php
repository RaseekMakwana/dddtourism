<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->

    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" style="color: white" data-toggle="dropdown" href="#">
            {{ session('display_name') }}
        </a>
      </li>
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" style="color:white">
            <i class="fa fa-cog"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="{{ url('admin/diu/change-password') }}" class="dropdown-item">
                <i class="fas fa-key mr-2"></i> Change Password
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ url("admin/log-out") }}" class="dropdown-item" id="logout">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
        </div>
    </li>
</ul>
