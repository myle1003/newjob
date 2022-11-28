<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
{{--        <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
        <span class="brand-text font-weight-light">New Job</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
{{--                <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">--}}
            </div>
            <div class="info">
                <a href="#" class="d-block">Super Admin</a>
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

                @foreach ($menuItems as $menuItem)
                    @if($menuItem->link == 'null')
                      <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    {{$menuItem->name}}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                        @foreach ($items as $item)
                            @if($item->id_menuItem==$menuItem->id)
                                    @if($item->name!='Super Admin')
                                        <li class="nav-item">
                                            <a href="{{$item->link}}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{$item->name}}</p>
                                            </a>
                                        </li>
                                    @else
                                        @role('Super admin')
                                        <li class="nav-item">
                                            <a href="{{$item->link}}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{$item->name}}</p>
                                            </a>
                                        </li>
                                        @endrole
                                    @endif
                                    @endif
                        @endforeach
                    @continue
{{--                            @else--}}
                    @endif
                    @if($menuItem->name!='Super Admin manage')
                    <li class="nav-item">
                        <a href="{{$menuItem->link}}" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                {{$menuItem->name}}
                            </p>
                        </a>
                    </li>
                    @else
                        @role('Super admin')
                        <li class="nav-item">

                            <a href="{{$menuItem->link}}" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    {{$menuItem->name}}
                                </p>
                            </a>
                        </li>
                        @endrole
                    @endif
{{--                            @endif--}}
                @endforeach
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
