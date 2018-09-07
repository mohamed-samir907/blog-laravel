<!--header start-->
<header class="header white-bg">
  <div class="sidebar-toggle-box">
      <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
  </div>
  <!--logo start-->
  <a load-href="/home" class="logo" >My<span>Blog</span></a>
  <!--logo end-->
  <div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
      <!-- settings start -->
      <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="icon-tasks"></i>
              <span class="badge bg-success">6</span>
          </a>
          <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                  <p class="green">You have 6 pending tasks</p>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Dashboard v1.3</div>
                          <div class="percent">40%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                              <span class="sr-only">40% Complete (success)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li class="external">
                  <a href="#">See All Tasks</a>
              </li>
          </ul>
      </li>
      <!-- settings end -->
      <!-- inbox dropdown start-->
      <li id="header_inbox_bar" class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="icon-envelope-alt"></i>
              <span class="badge bg-important">5</span>
          </a>
          <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-red"></div>
              <li>
                  <p class="red">You have 5 new messages</p>
              </li>
              <li>
                  <a href="#">
                      <span class="photo"><img alt="avatar" src="{{ asset('img/avatar-mini.jpg') }}"></span>
                            <span class="subject">
                            <span class="from">Jonathan Smith</span>
                            <span class="time">Just now</span>
                            </span>
                            <span class="message">
                                Hello, this is an example msg.
                            </span>
                  </a>
              </li>
              <li>
                  <a href="#">See all messages</a>
              </li>
          </ul>
      </li>
      <!-- inbox dropdown end -->
      <!-- notification dropdown start-->
      <li id="header_notification_bar" class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">

              <i class="icon-bell-alt"></i>
              <span class="badge bg-warning">7</span>
          </a>
          <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                  <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                  <a href="#">
                      <span class="label label-danger"><i class="icon-bolt"></i></span>
                      Server #3 overloaded.
                      <span class="small italic">34 mins</span>
                  </a>
              </li>
              <li>
                  <a href="#">See all notifications</a>
              </li>
          </ul>
      </li>
      <!-- notification dropdown end -->
  </ul>
  </div>
  <div class="top-nav ">
      <ul class="nav pull-right top-menu">
          <li>
              <input type="text" class="form-control search" placeholder="Search">
          </li>
          <!-- user login dropdown start-->
          <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                  <img alt="{{ auth()->user()->name }}" src="{{ asset(auth()->user()->profile->avatar) }}" style="max-height: 29px;">
                  <span class="username">{{ auth()->user()->name }}</span>
                  <b class="caret"></b>
              </a>
              <ul class="dropdown-menu extended logout">
                  <div class="log-arrow-up"></div>
                  <li>
                    <a href="{{ route('profile', ['id' => auth()->user()->id]) }}">
                      <i class=" icon-suitcase"></i>Profile
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('profile.edit', ['id' => auth()->user()]) }}">
                      <i class="icon-cog"></i> Settings
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="icon-bell-alt"></i> Notification
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      <i class="icon-key"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </li>
              </ul>
          </li>
          <!-- user login dropdown end -->
      </ul>
  </div>
</header>
<!--header end-->