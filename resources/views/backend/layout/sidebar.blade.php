@section('sidebar')
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ auth()->user()->name }} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{route('user.index')}}" class="nav-link {{ (request()->is('user')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tài khoản
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link  {{ (request()->is('user')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List user</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/user/create" class="nav-link {{ (request()->is('user/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create user</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('category.index')}}" class="nav-link {{ (request()->is('category')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link  {{ (request()->is('category')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/category/create" class="nav-link {{ (request()->is('category/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href=" {{ route('post.index') }} " class="nav-link {{ (request()->is('post')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Post
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('post.index') }}" class="nav-link {{ (request()->is('post')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/post/create" class="nav-link {{ (request()->is('post/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create post</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href=" {{ route('logout') }} " class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Đăng xuất
                <span class="right badge badge-danger">Hot</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@endsection
