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
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">主页</li>
            <li><a href="{{ route('admin.index') }}"> <i class="fa fa-home"></i> 主页</a></li>

            <li class="header">销售</li>

            <li class="treeview @if(request()->segment(2) == 'plateforms') active @endif">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>平台</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('plateforms.index') }}"><i class="fa fa-circle-o"></i> 平台列表</a></li>
                    <li><a href="{{ route('plateforms.create') }}"><i class="fa fa-plus"></i> 新增平台</a></li>                 
                </ul>
            </li>

            <li class="treeview @if(request()->segment(2) == 'exchanges') active @endif">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>外汇</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('exchanges.index') }}"><i class="fa fa-circle-o"></i> 外汇列表</a></li>
                    <li><a href="{{ route('exchanges.create') }}"><i class="fa fa-plus"></i> 新增外汇</a></li>                  
                </ul>
            </li>

            <li class="treeview @if(request()->segment(2) == 'games') active @endif">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>游戏</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('games.index') }}"><i class="fa fa-circle-o"></i> 游戏列表</a></li>
                    <li><a href="{{ route('games.create') }}"><i class="fa fa-plus"></i> 新增游戏</a></li>                    
                </ul>
            </li>

            <li class="treeview @if(request()->segment(2) == 'inventories') active @endif">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>库存</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('inventories.index') }}"><i class="fa fa-circle-o"></i> 当前库存</a></li>
                    <li><a href="{{ route('inventories.create') }}"><i class="fa fa-plus"></i> 新增库存</a></li>                    
                </ul>
            </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->