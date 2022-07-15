<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link  @if (!Request::is('/')) collapsed @endif" href="{{ route('index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @can('admin')
        <li class="nav-item">
            <a class="nav-link @if (!Request::is('users')) collapsed @endif" href="{{ route('users.index') }}">
            <i class="bi bi-file-earmark"></i>
            <span>Users</span>
            </a>
        </li>
      @endcan
      <li class="nav-item">
        <a class="nav-link @if (!Request::is('attendance')) collapsed @endif" href="{{ route('attendance.index') }}">
          <i class="bi bi-file-earmark"></i>
          <span>Attendance</span>
        </a>
      </li><!-- End Blank Page Nav -->
      <li class="nav-item">
        <a class="nav-link @if (!Request::is('users')) collapsed @endif" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside>
