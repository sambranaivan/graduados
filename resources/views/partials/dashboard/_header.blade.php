<header class="main-header">
  <a href="index2.html" class="logo">
    <span class="logo-mini"><b>A</b>LT</span>
    <span class="logo-lg"><b>Graduados</b></span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown messages-menu">
          <ul class="dropdown-menu">
            <li>
              <ul class="menu">
                <li>
                  <a href="#">
                    <div class="pull-left">
                      {{ HTML::image('assets/img/user2-160x160.jpg', 'imagen usuario', array('class' => 'img-circle')) }}
                    </div>
                    <h4>
                      Support Team
                      <small><i class="fa fa-clock-o"></i> 5 mins</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      {{ HTML::image('assets/img/user3-128x128.jpg', 'imagen usuario', array('class' => 'img-circle')) }}
                    </div>
                    <h4>
                      AdminLTE Design Team
                      <small><i class="fa fa-clock-o"></i> 2 hours</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      {{ HTML::image('assets/img/user4-128x128.jpg', 'imagen usuario', array('class' => 'img-circle')) }}
                    </div>
                    <h4>
                      Developers
                      <small><i class="fa fa-clock-o"></i> Today</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      {{ HTML::image('assets/img/user4-128x128.jpg', 'imagen usuario', array('class' => 'img-circle')) }}
                    </div>
                    <h4>
                      Sales Department
                      <small><i class="fa fa-clock-o"></i> Yesterday</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      {{ HTML::image('assets/img/user4-128x128.jpg', 'imagen usuario', array('class' => 'img-circle')) }}
                    </div>
                    <h4>
                      Reviewers
                      <small><i class="fa fa-clock-o"></i> 2 days</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
          </ul>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            {{ HTML::image('assets/img/user2-160x160.jpg', 'imagen usuario', array('class' => 'user-image')) }}

            <span class="hidden-xs">{{Auth::user()->name}}</span>
          </a>
        </li>
        <li>
          <a href="{{ url('panel/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar Sesión</a>
        </li>

      </ul>
    </div>
  </nav>
  </div>
</header>