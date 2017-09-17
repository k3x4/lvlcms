<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('adminlte/dist/img/avatar.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
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

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!--<li class="header">HEADER</li>-->
            <!-- Optionally, you can add icons to the links -->
            
            <li{{ bs_active(['admin/media*', 'admin/mediasizes*']) }}>
                <a href="#"><i class="fa fa-link"></i> <span>Media</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li{{ bs_active('admin/media') }}><a href="{{ url('admin/media') }}">All media</a></li>
                    <li{{ bs_active('admin/media/upload') }}><a href="{{ url('admin/media/upload') }}">Upload Media</a></li>
                    <li{{ bs_active('admin/mediasizes*') }}>
                        <a href="{{ url('admin/mediasizes') }}"> <span>Media Sizes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li{{ bs_active('admin/mediasizes') }}><a href="{{ url('admin/mediasizes') }}">All media sizes</a></li>
                            <li{{ bs_active('admin/mediasizes/create') }}><a href="{{ url('admin/mediasizes/create') }}">Create media size</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            
            <li{{ bs_active('admin/products*') }}>
                <a href="#"><i class="fa fa-link"></i> <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li{{ bs_active('admin/products') }}><a href="{{ url('admin/products') }}">All products</a></li>
                    <li{{ bs_active('admin/products/create') }}><a href="{{ url('admin/products/create') }}">Create product</a></li>
                </ul>    
            </li>
                
            <li{{ bs_active(['admin/users*', 'admin/roles*']) }}>
                <a href="#"><i class="fa fa-link"></i> <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li{{ bs_active('admin/users') }}><a href="{{ url('admin/users') }}">All users</a></li>
                    <li{{ bs_active('admin/users/create') }}><a href="{{ url('admin/users/create') }}">Create user</a></li>
                    <li{{ bs_active('admin/roles*') }}>
                        <a href="{{ url('admin/roles') }}"> <span>Roles</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li{{ bs_active('admin/roles') }}><a href="{{ url('admin/roles') }}">All roles</a></li>
                            <li{{ bs_active('admin/roles/create') }}><a href="{{ url('admin/roles/create') }}">Create role</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            
            <li><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
            
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>