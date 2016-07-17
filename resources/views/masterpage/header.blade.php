<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">NgeKEEP</a>
    </div>
    <!-- Top Menu Items -->
   <!--  <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name}}<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul> -->
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="{{\Route::currentRouteName() == 'DashboardHome' ? 'active' : ''}}">
                <a href="{{route('DashboardHome')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>

            <li class="{{\Route::currentRouteName() == 'AddTask' || \Route::currentRouteName() == 'MyTask' ? 'active' : ''}}">
                <a href="javascript:;" data-toggle="collapse" data-target="#task"><i class="fa fa-fw fa-tasks"></i> Tasks <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="task">
                    <li>
                        <a href="{{ route('AddTask') }}">Add Task</a>
                    </li>
                    <li>
                        <a href="{{ route('MyTask') }}">My Task</a>
                    </li>
                    <li>
                        <a href="{{ route('MyRequest') }}">My Request</a>
                    </li>
                </ul>
            </li>

            <li class="{{\Route::currentRouteName() == 'MyUsername' ? 'active' : ''}}">
                <a href="javascript:;" data-toggle="collapse" data-target="#task"><i class="fa fa-fw fa-tasks"></i> Tasks <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="task">
                    <li>
                        <a href="{{ route('MyUsername') }}">My Username</a>
                    </li>
                    <li>
                        <a href="/logout">Logout</a>
                    </li>
                </ul>
            </li>
          <!--   <li>
                <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
            </li>
            <li>
                <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
            </li>
            <li>
                <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
            </li>
            <li>
                <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
            </li> -->
            <!-- <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                </ul>
            </li> -->
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
