<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ URL::asset('vendor/adminlte/') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ URL::asset('vendor/adminlte/') }}/index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="{{ URL::asset('vendor/adminlte/') }}/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul>
            </li>
            @role('admin|cashier')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Manajemen Produk</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('kategori.index') }}"><i class="fa fa-book"></i> <span>Kategori</span></a></li>
                <li><a href="{{ route('produk.index') }}"><i class="fa fa-book"></i> <span>Produk</span></a></li>
            </ul>
          </li> 
          @endrole      
          @role('admin')
          <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Manajemen Users</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('users.index')}}"><i class="fa fa-circle-o"></i> User</a></li>
          <li><a href="{{ route('role.index')}}"><i class="fa fa-circle-o"></i> Role</a></li>
          <li><a href="{{ route('users.roles_permission') }}"><i class="fa fa-circle-o"></i> Role Permission</a></li>
          
        </ul>
      </li>
      @endrole
      
      <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="{{ __('Logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();"><i class="fa fa-circle-o text-red"></i> <span>Log Out</span></a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
      </ul>
      
    </section>
    <!-- /.sidebar -->
  </aside>