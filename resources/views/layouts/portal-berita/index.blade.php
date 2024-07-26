<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | Portal - Berita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <link rel="shortcut icon" href="/portal-berita/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="/portal-berita/images/favicon.png" type="image/x-icon">

    <!-- theme meta -->
    <meta name="theme-name" content="reporter" />

    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Neuton:wght@700&family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- # CSS Plugins -->
    <link rel="stylesheet" href="/portal-berita/plugins/bootstrap/bootstrap.min.css">

    <!-- # Main Style Sheet -->
    <link rel="stylesheet" href="/portal-berita/css/style.css">
</head>

<body>
    @include('layouts.portal-berita.partials.navbar')
    <main>
        <section class="section">
            <div class="container">
                @yield('content')
            </div>
        </section>
    </main>

    <footer class="bg-dark mt-5">
        <div class="container section">
            <div class="row">
                <div class="col-lg-10 mx-auto text-center">
                    <ul class="p-0 d-flex navbar-footer mb-0 list-unstyled">
                        <li class="nav-item my-0"> <a class="nav-link"
                                href="{{ route('portal-berita.contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright bg-dark content">Designed &amp; Developed By <a
                href="https://themefisher.com/">Themefisher</a></div>
    </footer>


    <!-- # JS Plugins -->
    <script src="/portal-berita/plugins/jquery/jquery.min.js"></script>
    <script src="/portal-berita/plugins/bootstrap/bootstrap.min.js"></script>

    <!-- Main Script -->
    <script src="/portal-berita/js/script.js"></script>

</body>

</html>
