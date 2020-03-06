<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('AdminLte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> --}}

      <!-- search form (Optional) -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> --}}
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Navigation</li>
          <!-- Optionally, you can add icons to the links -->
          {{-- <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
          <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li> --}}
          
          <li class="treeview">
            <a href="#"><i class=" fa fa-pencil-square-o"></i> <span>IT Service Request</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="item "{{active_route('serviceRequest.create')}}><a href="{{route('serviceRequest.create')}}"> Create Request</a></li>
                <li class="item "{{active_route('serviceRequest.listDraft')}}><a href="{{route('serviceRequest.listDraft')}}"> Draft</a></li>
            </ul>
          </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-cogs"></i> <span>Data Master</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="item "{{active_route('assets.index')}}><a href="{{route('assets.index')}}"> IT Assets</a></li>
            <li class="item "{{active_route('accessories.index')}}><a href="{{route('accessories.index')}}"> Accessories</a></li>
            <li class="item "{{active_route('license.index')}}><a href="{{route('license.index')}}"> License</a></li>
            <li class="item {{active_route('department.index')}}"><a href="{{ route('department.index')}}"> Department</a></li>
            <li class="item "{{active_route('section.index')}}><a href="{{route('section.index')}}"> Section</a></li>
            <li class="item "{{active_route('category.index')}}><a href="{{route('category.index')}}"> Category</a></li>
            <li class="item "{{active_route('location.index')}}><a href="{{route('location.index')}}"> Location</a></li>
            <li class="item "{{active_route('manufacture.index')}}><a href="{{route('manufacture.index')}}"> Manufacture</a></li>
            <li class="item "{{active_route('supplier.index')}}><a href="{{route('supplier.index')}}"> Supplier</a></li>
            <li class="item "{{active_route('workflow.index')}}><a href="{{route('workflow.index')}}"> Work Flow</a></li>
          </ul>
          
        </li>
        <li class="header">User Management</li>
        <!-- Optionally, you can add icons to the links -->
        {{-- <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li> --}}
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Access Control List</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          <li class="item {{active_route('users.index')}}"><a href="{{ route('users.index')}}">Users</a></li>
            <li class="item {{active_route('roles.index')}}"><a href="{{route('roles.index')}}">Roles</a></li>
          
          </ul>
          
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>