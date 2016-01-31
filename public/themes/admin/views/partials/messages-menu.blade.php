<!-- Menu toggle button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-envelope-o"></i>
    <span class="label label-success">4</span>
</a>
<ul class="dropdown-menu">
    <li class="header">You have 4 messages</li>
    <li>
        <!-- inner menu: contains the messages -->
        <ul class="menu">
            <li><!-- start message -->
                <a href="#">
                    <div class="pull-left">
                        <!-- User Image -->
                        <img src="{{ theme('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image"/>
                    </div>
                    <!-- Message title and timestamp -->
                    <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                    </h4>
                    <!-- The message -->
                    <p>Why not buy a new awesome theme?</p>
                </a>
            </li><!-- end message -->
        </ul><!-- /.menu -->
    </li>
    <li class="footer"><a href="#">See All Messages</a></li>
</ul>