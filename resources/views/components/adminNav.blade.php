
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <!-- Registration Link -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      @role('admin')
        <li class="nav-item">
          <a href="{{ route('admin.profileForm') }}" class="nav-link collapsed">
            <i class="bi bi-person-plus"></i>
            <span>Create Lessor</span>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.lessors.index') }}" class="nav-link collapsed">
              <i class="bi bi-person"></i>
              <span>View Lessor</span>
            </a>
          </li>
        @endrole
        @role('lessor')
        <li class="nav-item">
            <a href="{{ route('lessor.LessesForm') }}" class="nav-link collapsed">
              <i class="bi bi-person-plus"></i>
              <span>Create Lessee</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('lessor.lessees.show') }}" class="nav-link collapsed">
              <i class="bi bi-person"></i>
              <span>View Lessee</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('lessor.properties') }}" class="nav-link collapsed">
                <i class="bi bi-house"></i>
                <span>Add Properties</span>
            </a>
        </li>
        @endrole
    </ul>
  </aside>
