<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="assets/dist/img/event1.png" class="img-circle" alt="User Image">
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
                </a>
            </li>
            <li>
                <a href="{!! route('page.users') !!}">
                    <i class="fa fa-user"></i> <span>User</span>
                </a>
            </li>
            <li>
                <a href="{!! route('page.klien') !!}">
                    <i class="fa fa-thumbs-o-up"></i> <span>Klien</span>
                </a>
            </li>
            <li>
                <a href="{!! route('page.event') !!}">
                    <i class="fa fa-sticky-note-o "></i> <span>Event</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
