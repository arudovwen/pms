<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Brolik PMS</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <div id="preloader">
        <div id="loader"></div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="header-logo">
            <a class="site-logo" href="/home">
              <strong style="font-size:1.5em; color:white;"> BROLIK PMS</strong>
            </a>
        </div>

        <nav class="row header-nav-wrap wide">
            <ul class="header-main-nav">
                    <li class="current"><a class="smoothscroll" href="#home" title="intro">Intro</a></li>
                    <li><a class="smoothscroll" href="#about" title="about">About</a></li>
                    <li><a class="smoothscroll" href="#features" title="features">Features</a></li>
                        <!-- Authentication Links -->
                     @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"> {{ __('Login') }} <i class="fas fa-sign-in-alt"></i></a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"> {{ __('Register') }} <i class="fas fa-plus-circle"></i></a>
                            </li>
                        @endif
                    @else
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
                        </li>


                        <li class="nav-item dropdown">


                            <div >
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <i class="fas fa-sign-out-alt"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

            </ul>

            <ul class="header-social">
                <li><a href="https://github.com/arudovwen"><i class="fab fa-github" aria-hidden="true"></i></a></li>
                <li><a href="https://twitter.com/a_sucsex"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="https://instagram.com/sucsexxful"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="https://linkedin.com/im/success-ahon"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
        </nav>

        <a class="header-menu-toggle" href="#"><span>Menu</span></a>

    </header> <!-- end header -->


    <!-- home
    ================================================== -->
    <section id="home" class="s-home target-section">

        <div class="home-image-part"></div>

        <div class="home-content">

            <div class="row home-content__main wide">

                <h1>
                An Amazing Web App <br>
                That Does It All.
                </h1>

                <h3>
                Voluptatem ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.
                </h3>

                <div class="home-content__button">
                    {{-- <a class="btn-video" href="https://player.vimeo.com/video/14592941?color=00a650&title=0&byline=0&portrait=0" data-lity>
                        <span class="video-icon"></span>
                    </a> --}}
                    <a href="/register" class=" btn btn--primary btn--large">
                        Join Us
                    </a>
                </div>

            </div> <!-- end home-content__main -->

            <a href="#about" class="home-scroll smoothscroll">
                <span class="home-scroll__text">Scroll Down</span>
                <span class="home-scroll__icon"></span>
            </a>

        </div> <!-- end home-content -->

    </section> <!-- end s-home -->


    <!-- about
    ================================================== -->
    <section id="about" class="s-about target-section">

        <div class="row section-header narrower align-center" data-aos="fade-up">
            <div class="col-full">
                <h1 class="display-1">
                    The Most Popular And Number One Project Management App.
                </h1>
                <p class="lead">
                    Et nihil atque ex. Reiciendis et rerum ut voluptate. Omnis molestiae nemo est.
                    Ut quis enim rerum quia assumenda repudiandae non cumque qui. Amet repellat
                    omnis ea.
                </p>
            </div>
        </div> <!-- end section-header -->

        <div class="row about-desc" data-aos="fade-up">
            <div class="col-full slick-slider about-desc__slider">

                <div class="about-desc__slide">
                    <h3 class="item-title">Smart.</h3>

                    <p>
                    Et nihil atque ex. Reiciendis et rerum ut voluptate. Omnis molestiae nemo est.
                    Ut quis enim rerum quia assumenda repudiandae non cumque qui. Amet repellat
                    omnis ea aut cumque eos.
                    </p>
                </div>  <!-- end about-desc__slide -->

                <div class="about-desc__slide">
                    <h3 class="item-title">User-Friendly.</h3>

                    <p>
                    Et nihil atque ex. Reiciendis et rerum ut voluptate. Omnis molestiae nemo est.
                    Ut quis enim rerum quia assumenda repudiandae non cumque qui. Amet repellat
                    omnis ea aut cumque eos.
                    </p>
                </div>  <!-- end about-desc__slide -->

                <div class="about-desc__slide">
                    <h3 class="item-title">Powerful.</h3>

                    <p>
                    Et nihil atque ex. Reiciendis et rerum ut voluptate. Omnis molestiae nemo est.
                    Ut quis enim rerum quia assumenda repudiandae non cumque qui. Amet repellat
                    omnis ea aut cumque eos.
                    </p>
                </div>  <!-- end about-desc__slide -->

                <div class="about-desc__slide">
                    <h3 class="item-title">Secure.</h3>

                    <p>
                    Et nihil atque ex. Reiciendis et rerum ut voluptate. Omnis molestiae nemo est.
                    Ut quis enim rerum quia assumenda repudiandae non cumque qui. Amet repellat
                    omnis ea aut cumque eos.
                    </p>
                </div>  <!-- end about-desc__slide -->

            </div> <!-- end about-desc__slider -->
        </div> <!-- end about-desc -->

        <div class="row about-bottom-image" data-aos="fade-up">
            <img src="images/plan.png"
                 srcset="images/plan.png 600w,
                         images/plan.png 1400w,
                         images/plan.png 2800w"
                 sizes="(max-width: 2800px) 100vw, 2800px"
                 alt="App Screenshots">
         </div>

    </section> <!-- end s-about -->


    <!-- process
    ================================================== -->
    <section id="process" class="s-process">

        <div class="row">
            <div class="col-full text-center" data-aos="fade-up">
                <h2 class="display-2">How The App Works?</h2>
            </div>
        </div>

        <div class="row process block-1-4 block-m-1-2 block-tab-full">
            <div class="col-block item-process" data-aos="fade-up">
                <div class="item-process__text">
                    <h3>Sign Up</h3>
                    <p>
                    Quos dolores saepe mollitia deserunt accusamus autem reprehenderit. Voluptas facere animi explicabo non quis magni recusandae.
                    Numquam debitis pariatur omnis facere unde.
                    </p>
                </div>
            </div>
            <div class="col-block item-process" data-aos="fade-up">
                <div class="item-process__text">
                    <h3>Create Company</h3>
                    <p>
                    Quos dolores saepe mollitia deserunt accusamus autem reprehenderit. Voluptas facere animi explicabo non quis magni recusandae.
                    Numquam debitis pariatur omnis facere unde.
                    </p>
                </div>
            </div>
            <div class="col-block item-process" data-aos="fade-up">
                <div class="item-process__text">
                    <h3>Create Project</h3>
                    <p>
                    Quos dolores saepe mollitia deserunt accusamus autem reprehenderit. Voluptas facere animi explicabo non quis magni recusandae.
                    Numquam debitis pariatur omnis facere unde.
                    </p>
                </div>
            </div>
            <div class="col-block item-process" data-aos="fade-up">
                <div class="item-process__text">
                    <h3>Build</h3>
                    <p>
                    Quos dolores saepe mollitia deserunt accusamus autem reprehenderit. Voluptas facere animi explicabo non quis magni recusandae.
                    Numquam debitis pariatur omnis facere unde.
                    </p>
                </div>
            </div>
        </div> <!-- end process -->

        <div class="row process-bottom-image" data-aos="fade-up">
            <img src="images/phone-app-screens-1000.png"
                 srcset="images/phone-app-screens-600.png 600w,
                         images/phone-app-screens-1000.png 1000w,
                         images/phone-app-screens-2000.png 2000w"
                 sizes="(max-width: 2000px) 100vw, 2000px"
                 alt="App Screenshots">
         </div>

    </section> <!-- end s-process -->


    <!-- features
    ================================================== -->
    <section id="features" class="s-features target-section">

        <div class="row section-header narrower align-center has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                <h1 class="display-1">
                    Loaded With Features You Would Surely Love.
                </h1>
                <p class="lead">
                    Et nihil atque ex. Reiciendis et rerum ut voluptate. Omnis molestiae nemo est.
                    Ut quis enim rerum quia assumenda repudiandae non cumque qui. Amet repellat
                    omnis ea.
                </p>
            </div>
        </div> <!-- end section-header -->

        <div class="row bit-narrow features block-1-2 block-mob-full">

            <div class="col-block item-feature" data-aos="fade-up">
                <div class="item-feature__icon">
                    <i class="icon-upload"></i>
                </div>
                <div class="item-feature__text">
                    <h3 class="item-title">Cloud Based</h3>
                    <p>Nemo cupiditate ab quibusdam quaerat impedit magni. Earum suscipit ipsum laudantium.
                    Quo delectus est. Maiores voluptas ab sit natus veritatis ut. Debitis nulla cumque veritatis.
                    Sunt suscipit voluptas ipsa in tempora esse soluta sint.
                    </p>
                </div>
            </div>


            <div class="col-block item-feature" data-aos="fade-up">
                <div class="item-feature__icon">
                    <i class="icon-shield"></i>
                </div>
                <div class="item-feature__text">
                    <h3 class="item-title">Always Secure</h3>
                    <p>Nemo cupiditate ab quibusdam quaerat impedit magni. Earum suscipit ipsum laudantium.
                    Quo delectus est. Maiores voluptas ab sit natus veritatis ut. Debitis nulla cumque veritatis.
                    Sunt suscipit voluptas ipsa in tempora esse soluta sint.
                    </p>
                </div>
            </div>


            <div class="col-block item-feature" data-aos="fade-up">
                <div class="item-feature__icon">
                    <i class="icon-chat"></i>
                </div>
                <div class="item-feature__text">
                    <h3 class="item-title">Group Chat</h3>
                    <p>Nemo cupiditate ab quibusdam quaerat impedit magni. Earum suscipit ipsum laudantium.
                    Quo delectus est. Maiores voluptas ab sit natus veritatis ut. Debitis nulla cumque veritatis.
                    Sunt suscipit voluptas ipsa in tempora esse soluta sint.
                    </p>
                </div>
            </div>

            <div class="col-block item-feature" data-aos="fade-up">
                <div class="item-feature__icon">
                    <i class="icon-wallet"></i>
                </div>
                <div class="item-feature__text">
                    <h3 class="item-title">Payments</h3>
                    <p>Nemo cupiditate ab quibusdam quaerat impedit magni. Earum suscipit ipsum laudantium.
                    Quo delectus est. Maiores voluptas ab sit natus veritatis ut. Debitis nulla cumque veritatis.
                    Sunt suscipit voluptas ipsa in tempora esse soluta sint.
                    </p>
                </div>
            </div>

        </div> <!-- end features -->

        <div class="testimonials-wrap" data-aos="fade-up">

            <div class="row">
                <div class="col-full testimonials-header">
                    <h2 class="display-2">1 Million+ Users Can't Be Wrong.</h2>
                </div>
            </div>

            <div class="row testimonials">

                <div class="col-full slick-slider testimonials__slider">

                    <div class="testimonials__slide">
                        <img src="images/avatars/user-01.jpg" alt="Author image" class="testimonials__avatar">
                        <div class="testimonials__author">
                            <span class="testimonials__name">Naruto Uzumaki</span>
                            <a href="#0" class="testimonials__link">@narutouzumaki</a>
                        </div>
                        <p>Qui ipsam temporibus quisquam velMaiores eos cumque distinctio nam accusantium ipsum.
                        Laudantium quia consequatur molestias delectus culpa facere hic dolores aperiam. Accusantium praesentium corpori.</p>
                    </div> <!-- end testimonials__slide -->

                    <div class="testimonials__slide">
                        <img src="images/avatars/user-02.jpeg" alt="Author image" class="testimonials__avatar">
                        <div class="testimonials__author">
                            <span class="testimonials__name">Sasuke Uchiha</span>
                            <a href="#0" class="testimonials__link">@sasukeuchiha</a>
                        </div>
                        <p>Excepturi nam cupiditate culpa doloremque deleniti repellat. Veniam quos repellat voluptas animi adipisci.
                        Nisi eaque consequatur. Quasi voluptas eius distinctio. Atque eos maxime. Qui ipsam temporibus quisquam vel.</p>
                    </div> <!-- end testimonials__slide -->

                    <div class="testimonials__slide">
                        <img src="images/avatars/user-03.jpeg" alt="Author image" class="testimonials__avatar">
                        <div class="testimonials__author">
                            <span class="testimonials__name">Shikamaru Nara</span>
                            <a href="#0" class="testimonials__link">@shikamarunara</a>
                        </div>
                        <p>Repellat dignissimos libero. Qui sed at corrupti expedita voluptas odit. Nihil ea quia nesciunt. Ducimus aut sed ipsam.
                        Autem eaque officia cum exercitationem sunt voluptatum accusamus. Quasi voluptas eius distinctio.</p>
                    </div> <!-- end testimonials__slide -->

                </div> <!-- end testimonials__slider -->

            </div> <!-- end testimonials -->

        </div> <!-- end testimonials-wrap -->

    </section> <!-- end s-features -->




    <!-- footer
    ================================================== -->
    <footer class="s-footer footer">

        <div class="row footer__top">
            <div class="col-six md-full">
                <h1 class="display-2">
                    Let's Stay In Touch.
                </h1>
                <p class="lead">
                    Subscribe for updates, special offers and more.
                </p>
            </div>
            <div class="col-six md-full footer__subscribe end">
                <div class="subscribe-form">
                    <form id="mc-form" class="group" novalidate="true">

                        <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">

                        <input type="submit" name="subscribe" value="Sign Up">

                        <label for="mc-email" class="subscribe-message"></label>

                    </form>
                </div>
            </div>
        </div>

        <div class="row footer__bottom">
            <div class="col-five tab-full">
                <div class="footer__logo">
                    <a href="/home">
                        <strong style="font-size:1.5em; color:white;"> BROLIK PMS</strong>
                    </a>
                </div>

                <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.
                </p>

                <ul class="footer__social">
                    <li><a href="https://github.com/arudovwen"><i class="fab fa-github" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/a_sucsex"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="https://instagram.com/sucsexxful"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="https://linkedin.com/im/success-ahon"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
            </div>

            <div class="col-six tab-full end">
                <ul class="footer__site-links">
                    <li><a class="smoothscroll" href="#home" title="intro">Intro</a></li>
                    <li><a class="smoothscroll" href="#about" title="about">About</a></li>
                    <li><a class="smoothscroll" href="#features" title="features">Features</a></li>

                </ul>

                <p class="footer__contact">
                    Do you have a question? Send us a word: <br>
                    <a href="mailto:#0" class="footer__mail-link">successahon@gmail.com</a>
                </p>

                <div class="cl-copyright">
    <span>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved

</span>
                </div>
            </div>

        </div>

        <div class="go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"></a>
        </div>

    </footer> <!-- end s-footer -->


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
