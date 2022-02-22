<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ '张三' }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">HOME</li>
            <li><a href="{{ route('admin.index') }}"> <i class="fa fa-home"></i> Home</a></li>

            <li class="header">SELL</li>

            <li class="treeview @if(request()->segment(2) == 'plateforms') active @endif">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>Plateforms</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('plateforms.index') }}"><i class="fa fa-circle-o"></i> List plateforms</a></li>
                    <li><a href="{{ route('plateforms.create') }}"><i class="fa fa-plus"></i> Create plateform</a></li>                 
                </ul>
            </li>

            <li class="treeview @if(request()->segment(2) == 'exchanges') active @endif">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>Exchanges</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('exchanges.index') }}"><i class="fa fa-circle-o"></i> List exchanges</a></li>
                    <li><a href="{{ route('exchanges.create') }}"><i class="fa fa-plus"></i> Create exchange</a></li>                  
                </ul>
            </li>

            <li class="treeview @if(request()->segment(2) == 'games') active @endif">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>Games</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('games.index') }}"><i class="fa fa-circle-o"></i> List games</a></li>
                    <li><a href="{{ route('games.create') }}"><i class="fa fa-plus"></i> Create game</a></li>                    
                </ul>
            </li>

            <li class="treeview @if(request()->segment(2) == 'inventories') active @endif">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>Inventories</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('inventories.index') }}"><i class="fa fa-circle-o"></i> List Inventories</a></li>
                    <li><a href="{{ route('inventories.create') }}"><i class="fa fa-plus"></i> Create Inventories</a></li>                    
                </ul>
            </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->