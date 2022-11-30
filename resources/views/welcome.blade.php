@extends('layout.layout')

@section('hero')

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <a href="index.html" class="hero-logo" data-aos="zoom-in"><img src="assets/img/hero-logo.png" alt=""></a>
            <h1 data-aos="zoom-in">Willkommen zu Die Ewigen</h1>
            <h2 data-aos="fade-up">Das original Browsergame aus dem Jahr 2001 - Qualität hält sich eben sehr lange</h2>
            <a data-aos="fade-up" data-aos-delay="200" onclick="let pageHeight = window.innerHeight;window.scrollBy(0, pageHeight);" class="btn-get-started scrollto" type="submit">Loslegen</a>
        </div>
    </section><!-- End Hero -->

@endsection
@section('content')
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Über uns</h2>
                {{--                <p>Magnam dolores commodi suscipit eius consequatur</p>--}}
            </div>

            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="image">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3 ">
                        {{--                        <h3>Voluptatem dignissimos provident quasi corporis</h3>--}}
                        <div class="content">

                            Herzlich Willkommen bei <b>Die Ewigen</b>, einem browserbasierten Multiplayer-Onlinegame
                            (Browsergame), bei dem dich folgendes erwartet:<br><br>
                            <div class="p_box1">
                                &nbsp;- <b>4 spielbare Rassen</b>, mit unterschiedlichen Stärken, vom Händler bis zum
                                Kämpfer<br>
                                &nbsp;- 1 KI-gesteuerte Rasse<br>
                                &nbsp;- verschiedene Raumschiffstypen und Abwehrsysteme<br>
                                &nbsp;- <b>viele Gebäude und Forschungen</b><br>
                                &nbsp;- ein umfangreiches <b>Allianzsystem</b><br>
                                &nbsp;- betätige dich als <b>Kopfgeldjäger</b><br>
                                &nbsp;- ein ausgefeiltes <b>Handelssystem</b><br>
                                &nbsp;- Entdecke die Vergangenheit der Galaxie bei spannenden <b>Quests</b><br>
                                &nbsp;- Das Browsergame Die Ewigen wird permanent erweitert. Entdecke immer wieder neue
                                Features.<br>
                            </div>
                            <br><br>


                            <div align="center">
                                <img src="/img/screenshots/g026_s.jpg" alt="Picture 1">&nbsp;&nbsp;&nbsp;
                                <img src="/img/screenshots/g033_s.jpg" alt="Picture 2">&nbsp;&nbsp;&nbsp;
                                <img src="/img/screenshots/g023_s.jpg" alt="Picture 3">
                            </div>


                            <p>Die Spieler streiten um die Vorherrschaft und um den Titel des Erhabenen. Und DU bist
                                mitten drin!</p>
                            <p>
                            </p>
                            <p>Entscheide dich für eine Rasse mit einzigartigen Attributen und Schiffen. Schließe
                                Bündnisse und stürze das Universum in eine Zeit des Krieges oder sorge für eine Ära des
                                Friedens. Treibe Handel und Diplomatie. Es liegt alles in deiner Hand!</p>
                            <p>
                            </p>
                            <p>Der Kampf um den Titel des Erhabenen hat begonnen!</p>
                            <p>

                            </p>
                            <p>Spielbar auf mehreren offiziellen Servern mit unterschiedlichen Tickzeiten und einer
                                großen Community ist <b>Die Ewigen</b> die ultimative Referenz in Sachen Online
                                Strategie Browsergame.</p>
                            <p>

                            </p>
                            <p align="center">

                                <a href="https://de.mmofacts.com/die-ewigen-das-browsergame-108" target="_blank"><img
                                        src="https://grafik-de.bgam.es/b/gn_vote.gif" border="0"></a>

                            </p>
                            <p>

                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Was euch Erwartet</h2>
            </div>

            <div class="row">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up">
                        <i class="bx bx-receipt"></i>
                        <h4>Rassen</h4>
                        <p>4 spielbare Rassen, mit unterschiedlichen Stärken, vom Händler bis zum Kämpfer</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-cube-alt"></i>
                        <h4>Künstliche Inteligenz</h4>
                        <p>1 KI-gesteuerte Rasse</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
                        <i class="bx bx-images"></i>
                        <h4>Schiffe / Verteidigungsanlagen</h4>
                        <p>Verschiedene Raumschiffstypen und Abwehrsysteme</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
                        <i class="bx bx-shield"></i>
                        <h4>Gebäude / Forschungen</h4>
                        <p>Baut eueren Planeten aus</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
                        <i class="bx bx-shield"></i>
                        <h4>Allianzen</h4>
                        <p>Spielt mit Allianzen und Metas</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
                        <i class="bx bx-shield"></i>
                        <h4>Kopfgeld</h4>
                        <p>betätige dich als Kopfgeldjäger</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
                        <i class="bx bx-shield"></i>
                        <h4>Handel / Auktionen</h4>
                        <p>ein ausgefeiltes Handelssystem</p>
                    </div>
                </div>
                <div class="image col-lg-6 order-1 order-lg-2"
                     style='background-image: url("assets/img/services.jpg");background-size: contain;'
                     data-aos="fade-left" data-aos-delay="100"></div>
            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
        <div class="container">

            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <figure>
                                <img src="assets/img/featured-1.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="tab-pane" id="tab-2">
                            <figure>
                                <img src="assets/img/featured-2.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="tab-pane" id="tab-3">
                            <figure>
                                <img src="assets/img/featured-3.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="tab-pane" id="tab-4">
                            <figure>
                                <img src="assets/img/featured-4.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-left">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                                <h4>Die Ewigen</h4>
                                <p>Die Ewigen berufen sich auf eine Jahrtausende alte Tradition, ausgewogen und überlegt
                                    zu agieren. Ihre Flotten beherbergen die schnellsten Jagdboote des Universums. Wähle
                                    die Ewigen und erlebe eine ausgeglichene Flottenstärke.</p>
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                                <h4>K'Tharr</h4>
                                <p>Die K'Tharr sind das aggressivste Volk. Ihre Schiffe richten enormen Schaden an,
                                    haben aber defizitäre Schilde. Ihnen geht es um die pure Wucht des Aufpralls.
                                    K'Tharr leben und sterben für den Kampf.</p>
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                                <h4>Ishtar </h4>
                                <p>Die Ishtar sind merkantile Wesen, deren Frachter größer sind, als alle anderen
                                    bekannten. Auch der Aufklärung haben die Ishtar eine hohe Aufmerksamkeit zugeordnet.
                                    Pazifistisch, wie sie zuweilen sind, arbeiten sie gegen Planeten eher mit Lahmlegung
                                    denn Zerstörung.</p>
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                                <h4>Z'Tha-ara</h4>
                                <p>Die Z'Tha-ara sind ein Kollektiv vieler insektenartiger Lebensformen. Sie haben ihre
                                    Zerstörer derart genetisch perfektioniert, dass diese von keinem bekanntem
                                    Scannersystem erkannt werden können. Ihre beschleunigte Repopulation lässt sie
                                    häufig auf Masse statt Klasse setzen.</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section><!-- End Featured Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Screenshots</h2>
                {{--                <p>Magnam dolores commodi suscipit eius consequatur ex aliquid fuga eum quidem</p>--}}
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>App</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery"
                                   class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery"
                                   class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <p>App</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery"
                                   class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Card 2</h4>
                            <p>Card</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery"
                                   class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Web 2</h4>
                            <p>Web</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery"
                                   class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 3</h4>
                            <p>App</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery"
                                   class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Card 1</h4>
                            <p>Card</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery"
                                   class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Card 3</h4>
                            <p>Card</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery"
                                   class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery"
                                   class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Section -->

{{--    <!-- ======= Team Section ======= -->--}}
{{--    <section id="team" class="team">--}}
{{--        <div class="container">--}}

{{--            <div class="section-title" data-aos="fade-up">--}}
{{--                <h2>Team</h2>--}}
{{--                <p>Magnam dolores commodi suscipit eius consequatur ex aliquid fuga eum quidem</p>--}}
{{--            </div>--}}

{{--            <div class="row">--}}

{{--                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">--}}
{{--                    <div class="member" data-aos="zoom-in">--}}
{{--                        <div class="member-img">--}}
{{--                            <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">--}}
{{--                            <div class="social">--}}
{{--                                <a href=""><i class="bi bi-twitter"></i></a>--}}
{{--                                <a href=""><i class="bi bi-facebook"></i></a>--}}
{{--                                <a href=""><i class="bi bi-instagram"></i></a>--}}
{{--                                <a href=""><i class="bi bi-linkedin"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="member-info">--}}
{{--                            <h4>Walter White</h4>--}}
{{--                            <span>Chief Executive Officer</span>--}}
{{--                            <p>Animi est delectus alias quam repellendus nihil nobis dolor. Est sapiente occaecati et--}}
{{--                                dolore. Omnis aut ut nesciunt explicabo qui. Eius nam deleniti ut omnis</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">--}}
{{--                    <div class="member" data-aos="zoom-in" data-aos-delay="100">--}}
{{--                        <div class="member-img">--}}
{{--                            <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">--}}
{{--                            <div class="social">--}}
{{--                                <a href=""><i class="bi bi-twitter"></i></a>--}}
{{--                                <a href=""><i class="bi bi-facebook"></i></a>--}}
{{--                                <a href=""><i class="bi bi-instagram"></i></a>--}}
{{--                                <a href=""><i class="bi bi-linkedin"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="member-info">--}}
{{--                            <h4>Sarah Jhonson</h4>--}}
{{--                            <span>Product Manager</span>--}}
{{--                            <p>Aspernatur iste esse aliquam enim et corporis. Molestiae voluptatem aut eligendi quis--}}
{{--                                aut. Libero vel amet voluptatem eos rerum non doloremque</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">--}}
{{--                    <div class="member" data-aos="zoom-in" data-aos-delay="200">--}}
{{--                        <div class="member-img">--}}
{{--                            <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">--}}
{{--                            <div class="social">--}}
{{--                                <a href=""><i class="bi bi-twitter"></i></a>--}}
{{--                                <a href=""><i class="bi bi-facebook"></i></a>--}}
{{--                                <a href=""><i class="bi bi-instagram"></i></a>--}}
{{--                                <a href=""><i class="bi bi-linkedin"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="member-info">--}}
{{--                            <h4>William Anderson</h4>--}}
{{--                            <span>CTO</span>--}}
{{--                            <p>Ut enim possimus nihil cupiditate beatae. Veniam facere quae non qui necessitatibus rerum--}}
{{--                                eos vero. Maxime sit sunt quo dolor autem est qui quaerat</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}
{{--    </section><!-- End Team Section -->--}}

    {{--    <!-- ======= Frequently Asked Questions Section ======= -->--}}
    {{--    <section id="faq" class="faq">--}}
    {{--        <div class="container">--}}

    {{--            <div class="section-title" data-aos="fade-up">--}}
    {{--                <h2>Frequently Asked Questions</h2>--}}
    {{--            </div>--}}

    {{--            <ul class="faq-list">--}}

    {{--                <li data-aos="fade-up">--}}
    {{--                    <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>--}}
    {{--                    <div id="faq1" class="collapse" data-bs-parent=".faq-list">--}}
    {{--                        <p>--}}
    {{--                            Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </li>--}}

    {{--                <li data-aos="fade-up" data-aos-delay="100">--}}
    {{--                    <a data-bs-toggle="collapse" data-bs-target="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>--}}
    {{--                    <div id="faq2" class="collapse" data-bs-parent=".faq-list">--}}
    {{--                        <p>--}}
    {{--                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </li>--}}

    {{--                <li data-aos="fade-up" data-aos-delay="200">--}}
    {{--                    <a data-bs-toggle="collapse" data-bs-target="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>--}}
    {{--                    <div id="faq3" class="collapse" data-bs-parent=".faq-list">--}}
    {{--                        <p>--}}
    {{--                            Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </li>--}}

    {{--                <li data-aos="fade-up" data-aos-delay="300">--}}
    {{--                    <a data-bs-toggle="collapse" data-bs-target="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>--}}
    {{--                    <div id="faq4" class="collapse" data-bs-parent=".faq-list">--}}
    {{--                        <p>--}}
    {{--                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </li>--}}

    {{--                <li data-aos="fade-up" data-aos-delay="400">--}}
    {{--                    <a data-bs-toggle="collapse" data-bs-target="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>--}}
    {{--                    <div id="faq5" class="collapse" data-bs-parent=".faq-list">--}}
    {{--                        <p>--}}
    {{--                            Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </li>--}}

    {{--                <li data-aos="fade-up" data-aos-delay="500">--}}
    {{--                    <a data-bs-toggle="collapse" data-bs-target="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>--}}
    {{--                    <div id="faq6" class="collapse" data-bs-parent=".faq-list">--}}
    {{--                        <p>--}}
    {{--                            Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </li>--}}

    {{--            </ul>--}}

    {{--        </div>--}}
    {{--    </section><!-- End Frequently Asked Questions Section -->--}}

@endsection
