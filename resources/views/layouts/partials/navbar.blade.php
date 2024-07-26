<div class="nav-header">
    <div class="brand-logo">
        <a href="index.html">
            <span class="logo-compact"><img src="/assets/images/logo-compact.png" alt=""></span>
            <span class="brand-title">
                <img src="/assets/images/logo-text.png" alt="">
            </span>
        </a>
    </div>
</div>
<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="/assets/images/user.png" height="40" width="40" alt="">
                    </div>
                    <div class="dropdown-menu dropdown-profile animated fadeIn">
                        <div class="dropdown-content-body">
                            <ul class="list-unstyled">
                                {{-- <li>
                                    <a><i class="icon-user"></i> <span>Profile</span></a>
                                </li> --}}
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-link text-danger">
                                            <i class="icon-key"></i> <span>Logout</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
