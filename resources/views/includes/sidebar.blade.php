<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>School Event</p>
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
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li>
                <a href="{!! route('page.calendar') !!}">
                    <i class="fa fa-calendar"></i> <span>Calender</span>
                    <small class="label pull-right bg-red">3</small>
                </a>
            </li>
            <li>
                <a href="{!! route('page.users') !!}">
                    <i class="fa fa-envelope"></i> <span>User</span>
                    <small class="label pull-right bg-yellow">12</small>
                </a>
            </li>
            <li>
                <a href="{!! route('page.klien') !!}">
                    <i class="fa fa-envelope"></i> <span>Klien</span>
                    <small class="label pull-right bg-yellow">12</small>
                </a>
            </li>
            <li>
                <a href="{!! route('page.event') !!}">
                        <i class="fa fa-envelope"></i> <span>Event</span>
                    <small class="label pull-right bg-yellow">12</small>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
