<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>

            <!-- Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link has-arrow" href="javascript:void(0)" data-toggle="collapse"
                    data-target="#menuDropdown" aria-expanded="false" aria-controls="menuDropdown">
                    <i class="icon-grid menu-icon"></i><span class="nav-text">Menu</span>
                </a>
                <ul id="menuDropdown"
                    class="collapse {{ request()->is('category*') || request()->is('post*') ? 'show' : '' }}">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('category*') ? 'active' : '' }}"
                            href="{{ route('category.index') }}">Manajemen Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('post*') ? 'active' : '' }}"
                            href="{{ route('post.index') }}">Manajemen Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin*') ? 'active' : '' }}"
                            href="{{ route('admin.index') }}">Manajemen Admin</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('feedback') ? 'active' : '' }}" href="{{ route('admin.feedback') }}">
                    <i class="icon-envelope menu-icon"></i><span class="nav-text">Feedback</span>
                </a>
            </li>
        </ul>
    </div>
</div>
