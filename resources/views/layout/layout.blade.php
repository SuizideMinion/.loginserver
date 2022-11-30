<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BGam.es Browsergames</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <style>
        @yield('style')
    </style>

</head>

<body>
@yield('hero')

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <a href="index.html"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link {{ request()->is('home') ? 'active': ''}}" href="/home">Home</a></li>
                <li><a class="nav-link {{ request()->is('accounts') ? 'active': ''}}" href="/accounts">Server</a></li>
                <li><a class="nav-link {{ request()->is('discord') ? 'active': ''}}" href="https://discord.gg/gqegaKQmB7" target="_Blank">Discord</a></li>
                <li><a class="nav-link {{ request()->is('transaction') ? 'active': ''}}" href="/transaction">Spenden</a></li>
                <li><a class="nav-link {{ request()->is('wiki') ? 'active': ''}}" href="/wiki">Wiki</a></li>
                <li><a class="nav-link {{ request()->is('forum') ? 'active': ''}}" href="/forum">Forum</a></li>
                @guest
                    <li class="dropdown"><a href="#"><span>Login/Register</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register-user') }}">Register</a></li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a class="nav-link {{ request()->is('tickets') ? 'active': ''}}" href="/tickets">Support
                            @if(Auth::check() && Auth::user()->role >= 10)
                                @if(\App\Models\TicketThreads::where('status', 0)->first())
                                    <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">{{ \App\Models\TicketThreads::where('status', 0)->count() }}</span>
                                @endif
                            @else
                                @if(Auth::check() && \App\Models\TicketPosts::where('read', 0)->where('creator_id', auth()->user()->user_id)->first())
                                    <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">{{ \App\Models\TicketPosts::where('read', 0)->where('creator_id', auth()->user()->user_id)->count() }}</span>
                                @endif
                            @endif
                        </a>
                    </li>
                    <li class="dropdown"><a href="#"><span>{{ auth()->user()->spielername }}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('user.show', auth()->user()->id) }}">Dein Provil</a></li>
                            <li><a href="{{ route('usernotiz.index') }}">Notizblock</a></li>
                            <li><a href="{{ route('user.edit', auth()->user()->id) }}">Einstellungen</a></li>
                            <li><a class="nav-link" href="{{ route('signout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
@if($errors->any())
    <div class="card">
        <div class="card-body">
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        </div>
    </div>
@endif
<main id="main" style="background:#eee;">

    <div class="container mt-5">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5 mb-5">
    @yield('content')
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <a href="#header" class="scrollto footer-logo"><img src="/assets/img/hero-logo.png" alt=""></a>
                    <h3>BGam.es</h3>
                    <p>Wir vermissen die guten alten Zeiten!</p>
                </div>
            </div>

            <div class="row footer-newsletter justify-content-center">
                <div class="col-lg-6">
                    <form action="" method="post">
                        <input type="email" name="email" placeholder="Deine Email Adresse"><input type="submit" value="Abbonieren">
                    </form>
                </div>
            </div>

            <div class="social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
            </div>

        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>BGam.es / Die Ewigen / Andalur</span></strong>. All Rights Reserved
        </div>

    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
    var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
        trigger: 'focus'
    })
</script>
@yield('scripts')
</body>

</html>
