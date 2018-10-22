<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="{{ route('home') }}" class="site_title"><i class="fa fa-user"></i> <span>PekalonganInfo</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="{{ asset('img/logo.jpg') }}" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Login Saat ini</span>
        <h2>{{ Auth::user()->name }}</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home </a></li>
          <li><a href="{{ route('categories.index') }}"><i class="fa fa-list"></i> Category </a></li>
		      <!-- Blogs Menu -->
          <li><a><i class="fa fa-building"></i> Blogs<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('blogs.index') }}"><i class="fa fa-clipboard"></i> Post All</a></li>
              <li><a href="{{ route('blogs.create') }}"><i class="fa fa-plus"></i> Blog posts</a></li>
            </ul>
          </li>
          <li><a href="{{ route('blogs.sampah') }}"><i class="fa fa-trash"></i> Tong Sampah </a></li>
          <!-- End Maintenance -->
          <li><a><i class="fa fa-group"></i> Management User <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> User</a></li>
              <li><a href="#"><i class="fa fa-lock"></i> Role</a></li>
              <li><a href="#"><i class="fa fa-key"></i> Permission</a></li>
            </ul>
		  </li>
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>
