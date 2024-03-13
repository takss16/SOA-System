
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <!-- Registration Link -->
      @role('admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
        <li class="nav-item">
          <a href="{{ route('admin.profileForm') }}" class="nav-link collapsed">
            <i class="bi bi-person-plus"></i>
            <span>Lessor Profile</span>
          </a>
        </li>
        @endrole
    </ul>
  </aside>
