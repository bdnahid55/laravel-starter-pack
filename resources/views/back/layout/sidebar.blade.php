<div class="left-side-bar">
        <div class="brand-logo">
            <a href="{{ route('admin.dashboard') }}">
                <img src="/back/vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
                <img src="/back/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo" />
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">

                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle no-arrow  {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <span class="micon bi bi-calendar4-week"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>

                    {{-- Settings option menu  --}}
                    <li>
                        <div class="sidebar-small-cap">Extra</div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
