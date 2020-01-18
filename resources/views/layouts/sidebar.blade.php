    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          TIMETABLE APP</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ Request::path() == 'home' ? 'active' : '' }}">
            <a class="nav-link" href="/home">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ Request::path() == 'course' ? 'active' : '' }}">
            <a class="nav-link" href="/course">
              <i class="material-icons">info</i>
              <p>Course</p>
            </a>
          </li>
          <li class="{{ Request::path() == 'session' ? 'active' : '' }}">
            <a class="nav-link" href="/session">
              <i class="material-icons">schedule</i>
              <p>Session</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

