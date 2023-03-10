<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ asset("adminlte/index3.html") }}" class="brand-link">
    <img src="{{ asset("adminlte/dist/img/AdminLTELogo.png") }}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset("adminlte/dist/img/user2-160x160.jpg") }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a asp-controller="Dashboard" asp-action="Index" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Widgets
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link active">
            <i class="bi bi-archive nav-icon"></i>
            <p>
              S???n ph???m
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route("product.index") }}" class="nav-link">
                <p>T???t c??? s???n ph???m</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route("product.create") }}" class="nav-link">
                <p>Th??m m???i</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route("category.index") }}" class="nav-link">
                <p>Danh m???c</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tag.index') }}" class="nav-link">
                <p>T??? kh??a</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route("attribute.index")}}" class="nav-link">
                <p>C??c thu???c t??nh</small></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/fixed-topnav.html" class="nav-link">

                <p>????nh gi??</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-layers"></i>
            <p>
              Giao di???n
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('slider.index') }}" class="nav-link">
                <p>Slider</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('link.index') }}" class="nav-link">
                <p>Li??n k???t c?? nh??n</p>
              </a>
            </li>
          </ul>
        </li>
        </li>
        <li class="nav-item">
          <a href="{{ route('menu.index') }}" class="nav-link">
            <i class="nav-icon bi bi-menu-button"></i>
            <p>
              Menu
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-person-check"></i>
            <p>
              Th??nh vi??n
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route("user.index")}}" class="nav-link">

                <p>T???t c??? ng?????i d??ng</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route("user.create")}}" class="nav-link">

                <p>Th??m m???i</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('role.index') }}" class="nav-link">
                <p>Vai tr??</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('permission.index') }}"  class="nav-link">
                <p>Qu???n l?? quy???n</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route("account.logout") }}" class="nav-link">
            <i class="nav-icon bi bi-menu-button"></i>
            <p>
              ????ng xu???t
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>