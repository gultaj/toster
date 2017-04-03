<!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo"><b>Tosber</b>Admin</a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- search form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    @include('partials.menu.messages')
                </li><!-- /.messages-menu -->
                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">         
                    @include('partials.menu.notifications')
                </li>
                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">                    
                    @include('partials.menu.tasks')
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">                  
                    @include('partials.menu.user')
                </li>
            </ul>
        </div>
    </nav>
</header>