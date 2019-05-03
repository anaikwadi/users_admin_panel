<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('admin_thm/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::User()->name }}</p>
              <a href="#">{{ Auth::User()->email }}</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGATION</li>

            <li><a class="active treeview menu-open"  href="{{ URL('/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>


             {{-- Users Control Panel Start --}}
            @role(['superadministrator','administrator'])
            <li class="header">Users Control</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> Users</a></li>
                    <li><a href="{{route('roles.index')}}"><i class="fa fa-registered"></i> Roles</a></li>
                    <li><a href="{{route('permission.index')}}"><i class="fa fa-key"></i> Permissions</a></li>
                </ul>
            </li>
            @endrole
             {{-- Users Control Panel End --}}


             {{-- Daily Logs Start --}}
             @role(['superadministrator','administrator'])
            <li class="header">Logs Control</li>
             <li>
                 <a href="/log-viewer" target="_blank"><i class="fa fa-history"></i> <span class="nav-label">Get Logs</span></a>
             </li>
             @endrole
             {{-- Daily Logs End --}}
            
            {{-- <li>
              <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-yellow">12</small>
                  <small class="label pull-right bg-green">16</small>
                  <small class="label pull-right bg-red">5</small>
                </span>
              </a>
            </li> --}}

            {{-- <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
              </ul>
            </li> --}}
            
            {{-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li> --}}
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            {{-- <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li> --}}
            {{-- <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>