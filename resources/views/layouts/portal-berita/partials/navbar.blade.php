<header class="navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light px-0">
            <a class="navbar-brand" href="{{ route('portal-berita.home') }}">
                <span class="navbar-brand-text">Portal Berita</span>
            </a>
            <div class="navbar-actions order-3 ml-0 ml-md-4">
                <button aria-label="navbar toggler" class="navbar-toggler border-0" type="button" data-toggle="collapse"
                    data-target="#navigation"> <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <form action="#!" class="search order-lg-3 order-md-2 order-3 ml-auto">
                <input id="search-query" name="s" type="search" placeholder="Search..." autocomplete="off">
            </form>
            <div class="collapse navbar-collapse text-center order-lg-2 order-4" id="navigation">
                <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portal-berita.home') }}" role="button">
                            Home
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('portal-berita.contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
