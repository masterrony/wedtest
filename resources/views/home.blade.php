<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content='width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />

    <title>test IO</title>

    <link rel="icon" href="/assets/landing/favicon.png" sizes="128x128" type="image/png" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Reset CSS -->
    <link rel="stylesheet" href="/assets/landing/css/reset.css" />

    <!-- Font CSS -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- OWL Carouesel -->
    <link rel="stylesheet" href="/assets/landing/owl/css/owl.carousel.min.css" />

    <!-- Grid CSS -->
    <link href="/assets/landing/css/grid.css" rel="stylesheet" media="screen" />

    <!-- Custom CSS -->
    <link href="/assets/landing/css/custom.css" rel="stylesheet" media="screen" />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="/assets/landing/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="/assets/landing/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body>

    <header class="header">
        <div class="container-fluid">

            <a href="#" class="logo"></a>
            <ul class="main-navigation">
                <li class="active"><a href="#home">Home </a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#offer">What we offer?</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                @if(isset($role))
                    @if($role == 'admin')
                        <li><a href="{{route('panel.admin.file')}}">Admin</a></li>
                    @elseif($role == 'customer')
                        <li><a href="{{route('panel.customer')}}">My panel</a></li>
                    @else
                        <li><a href="{{route('auth.')}}">Login</a></li>
                    @endif
                @endif
            </ul>

            <a class="nav-mobile jsNavMobile">
                <span></span>
                <span></span>
                <span></span>
            </a>

        </div>

    </header>
    <!-- ./header-->

    <section class="hero" id="home">
        <div class="section-center">
            <div class="section-center-1">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-0 col-lg-4 col-lg-offset-1">
                            <h1 class="hero-title">We catch your happy moments </h1>
                            <p class="mb-30">By choosing our agency you will obtain unforgettable memories and amazing experience. We will help you to make your dreams come true!</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-6">
                                    <a href="#" class="btn btn-green btn-block">Contact us</a>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-6">
                                    <ul class="social-networks mt-10">
                                        <li><a href="#" class="facebook"></a></li>
                                        <li><a href="#" class="instagram"></a></li>
                                        <li><a href="#" class="youtube"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./row-->
                </div>
            </div>
        </div>

        <div class="hero-slider">
            <div id="owl-hero" class="owl-carousel owl-hero">
                <div class="item">
                    <img src="/assets/landing/images/hero-img.jpg" />
                </div>
                <div class="item">
                    <img src="/assets/landing/images/why-img.jpg" />
                </div>
                <div class="item">
                    <img src="/assets/landing/images/offer-img.jpg" />
                </div>
            </div>
            <div class="slide-counter"></div>
            <div class="expand-image"></div>
        </div>
    </section>
    <!-- ./hero-->

    <section class="why" id="about">

        <div class="why-image">
            <img src="/assets/landing/images/why-img.jpg" />
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-4 col-lg-6 col-lg-offset-5">
                    <div class="why-box">
                        <p class="color-green small text-upper font500">Wedding photo video</p>
                        <h1 class="text-upper font600">WHY DO WE DIFFER FROM OTHERS?</h1>
                        <p class="desc">On your wedding day, the photographer and cinematographer can become interlopers to your day. We do things differently.<br />Your relationship and your wedding day are entirely unique. We are there to blend so seamlessly in to the defining moments that you are always at ease, always natural. The result is that we capture the essence which makes your special day what it is in a story – telling style. We feel honoured to fulfil this role. We care deeply that we preserve a true and inspiring portrayal of your day. </p>
                        <a href="#" class="btn btn-border-green btn-sm">Check our blog</a>
                    </div>
                </div>
            </div>
            <!-- ./row-->

        </div>
    </section>
    <!-- ./why-->

    <section class="offer" id="offer">

        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                    <h1 class="text-center text-upper mb-30 offer-title">WHAT WE OFFER </h1>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="offer-item">
                                <span class="icon icon-photo"></span>
                                <div class="offer-info">
                                    <h4 class="font600">Modern Photo and Video </h4>
                                    <p>We offer high – quality video and photo in order to capture every detail of your perfect wedding day. </p>
                                    <a href="#" class="link-youtube">Check our Youtube</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="offer-item">
                                <span class="icon icon-drone"></span>
                                <div class="offer-info">
                                    <h4 class="font600">Air – drone photography</h4>
                                    <p>Have you ever dreamed of having a breathtaking movi – like video? Our professional photographers are highly skilled in using air – drones. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--./row-->

                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="offer-item">
                                <span class="icon icon-touch"></span>
                                <div class="offer-info">
                                    <h4 class="font600">Professional retouching </h4>
                                    <p>Our team provides you with brilliant photo editing in really short terms. You’ll get the amazing photos in the blink of your eye.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="offer-item">
                                <span class="icon icon-video"></span>
                                <div class="offer-info">
                                    <h4 class="font600">Actual Equipment </h4>
                                    <p>Our main goal is to achieve the outstanding results. So we are constantly in search of new updates of our equipment. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--./row-->

                </div>
            </div>
            <!--./row-->


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-7">
                    <div class="offer-box">
                        <span class="icon icon-smile"></span>
                        <h4 class="font600">Travel wedding photography </h4>
                        <p class="mb-0">We believe that your wedding is one of the most important days in your life, that’s why our company will do our best to make it unforgettable and peculiar. Our team can organize an extraordinary ceremony for you. If case you do not know exactly what you want – why don’t you consider choosing to make your wedding ceremony outside. You can choose any place you like – from the park in your city to the bank of the seaside. </p>
                    </div>
                </div>
            </div>
            <!--./row-->


            <div class="text-center">
                <a href="#" class="btn btn-green">Contact us</a>
            </div>



        </div>

        <div class="offer-image">
            <img src="/assets/landing/images/offer-img.jpg" />
        </div>
    </section>
    <!-- ./offer-->


    <section class="portfolio" id="portfolio">

        <div class="container">

            <h1 class="text-center text-upper font300 mb-40">Portfolio</h1>

            <div class="portfolio-section">
                <ul class="portfolio-tabs">
                    <li><a class="js-pf-link current">All <span>(456)</span></a></li>
                    <li><a class="js-pf-link">Photo <span>(400)</span></a></li>
                    <li><a class="js-pf-link">Video <span>(56)</span></a></li>
                </ul>

                <div class="portfolio-items">
                    <div class="row">
                        <div class="portfolio-col col-xs-12 col-sm-6 col-md-3">
                            <div class="item all video">
                                <img src="/assets/landing/images/galleries/gallery-img-1.jpg" /> <a class="video-play"></a>
                            </div>
                            <div class="item item-lg all photo">
                                <img src="/assets/landing/images/galleries/gallery-img-2.jpg" />
                            </div>
                        </div>
                        <div class="portfolio-col col-xs-12 col-sm-6 col-md-3">
                            <div class="item item-lg all photo">
                                <img src="/assets/landing/images/galleries/gallery-img-3.jpg" />
                            </div>
                            <div class="item all photo">
                                <img src="/assets/landing/images/galleries/gallery-img-4.jpg" />
                            </div>
                        </div>
                        <div class="portfolio-col col-xs-12 col-sm-6 col-md-3">
                            <div class="item all video">
                                <img src="/assets/landing/images/galleries/gallery-img-5.jpg" />
                                <a class="video-play"></a>
                            </div>
                            <div class="item item-lg all photo">
                                <img src="/assets/landing/images/galleries/gallery-img-6.jpg" />
                            </div>
                        </div>
                        <div class="portfolio-col col-xs-12 col-sm-6 col-md-3">
                            <div class="item item-instagram">
                                <img src="/assets/landing/images/galleries/gallery-img-instagram.jpg" />
                                <div class="instagram-box">
                                    <img src="/assets/landing/images/icons/icn-instagram-hover.png" />
                                    <p class="font500 mb-10">Follow us on Instagram</p>
                                    <a href="#" class="btn btn-border-black btn-sm">Go to Instagram</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-30">
                        <a class="btn btn-border-black btn-sm">Show more</a>
                    </div>

                </div>
            </div>
            <!-- ./portfolio-section-->

        </div>

    </section>
    <!-- ./portfolio-->

    <section class="testimonials" id="testimonials">

        <div class="container">

            <h1 class="color-white text-center text-upper font300 mb-40 h40">Testimonials</h1>

            <div id="owl-testimonials" class="owl-carousel owl-testimonials">
                <div class="item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="testimonial-item">
                                <div class="image">
                                    <img src="/assets/landing/images/testimonials/testimonial-img-1.jpg" />
                                </div>
                                <div class="author">
                                    <img src="/assets/landing/images/testimonials/author-1.jpg" />
                                    <img src="/assets/landing/images/testimonials/author-2.jpg" />
                                </div>
                                <p class="text-center mb-0 font500">Tania + Mike </p>
                                <p class="text-center small font300">23/02/2019</p>
                                <p class="mb-0">We didn’t expect such amazing results. We found test IO by our friend’s recommendation and are completely satisfied now. </p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="testimonial-item">
                                <div class="image">
                                    <img src="/assets/landing/images/testimonials/testimonial-img-2.jpg" />
                                </div>
                                <div class="author">
                                    <img src="/assets/landing/images/testimonials/author-3.jpg" />
                                    <img src="/assets/landing/images/testimonials/author-4.jpg" />
                                </div>
                                <p class="text-center mb-0 font500">Angelina + John </p>
                                <p class="text-center small font300">23/02/2019</p>
                                <p class="mb-0">Thank you test IO and whole team for such amazing result. I am really happy to have such brilliant memories about that amazing day! </p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="testimonial-item">
                                <div class="image">
                                    <img src="/assets/landing/images/testimonials/testimonial-img-3.jpg" />
                                </div>
                                <div class="author">
                                    <img src="/assets/landing/images/testimonials/author-5.jpg" />
                                    <img src="/assets/landing/images/testimonials/author-6.jpg" />
                                </div>
                                <p class="text-center mb-0 font500">Jenifer + Elton </p>
                                <p class="text-center small font300">23/02/2019</p>
                                <p class="mb-0">test IO made my dream come true, when I received photos and video from my wedding I said “WOW”, that was like Hollywood movie! Highly recommend!</p>
                            </div>
                        </div>
                    </div>
                    <!--./row-->

                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="testimonial-item">
                                <div class="image">
                                    <img src="/assets/landing/images/testimonials/testimonial-img-1.jpg" />
                                </div>
                                <div class="author">
                                    <img src="/assets/landing/images/testimonials/author-1.jpg" />
                                    <img src="/assets/landing/images/testimonials/author-2.jpg" />
                                </div>
                                <p class="text-center mb-0 font500">Tania + Mike </p>
                                <p class="text-center small font300">23/02/2019</p>
                                <p class="mb-0">We didn’t expect such amazing results. We found test IO by our friend’s recommendation and are completely satisfied now. </p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="testimonial-item">
                                <div class="image">
                                    <img src="/assets/landing/images/testimonials/testimonial-img-2.jpg" />
                                </div>
                                <div class="author">
                                    <img src="/assets/landing/images/testimonials/author-3.jpg" />
                                    <img src="/assets/landing/images/testimonials/author-4.jpg" />
                                </div>
                                <p class="text-center mb-0 font500">Angelina + John </p>
                                <p class="text-center small font300">23/02/2019</p>
                                <p class="mb-0">Thank you test IO and whole team for such amazing result. I am really happy to have such brilliant memories about that amazing day! </p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="testimonial-item">
                                <div class="image">
                                    <img src="/assets/landing/images/testimonials/testimonial-img-3.jpg" />
                                </div>
                                <div class="author">
                                    <img src="/assets/landing/images/testimonials/author-5.jpg" />
                                    <img src="/assets/landing/images/testimonials/author-6.jpg" />
                                </div>
                                <p class="text-center mb-0 font500">Jenifer + Elton </p>
                                <p class="text-center small font300">23/02/2019</p>
                                <p class="mb-0">test IO made my dream come true, when I received photos and video from my wedding I said “WOW”, that was like Hollywood movie! Highly recommend!</p>
                            </div>
                        </div>
                    </div>
                    <!--./row-->

                </div>

            </div>
            <div class="slide-counterT"></div>

        </div>

    </section>
    <!-- ./testimonials-->

    <section class="packages">

        <div class="container">

            <h1 class="text-upper text-center font300 mb-50 h40">Packages</h1>

            <div class="packages-item-list">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="package-item">
                            <h1 class="package-title">
                                Premium
                            </h1>
                            <ul class="package-list">
                                <li class="package-photo">4h Photo coverage </li>
                                <li class="package-video">2h Video coverage </li>
                                <li class="package-drone">1h Drone coverage</li>
                                <li class="package-touch">Retouching </li>
                            </ul>
                            <a class="btn btn-white-border btn-sm book-now mb-30">Book now</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="package-item">
                            <h1 class="package-title">
                                Gold
                            </h1>
                            <ul class="package-list">
                                <li class="package-photo">6h Photo coverage </li>
                                <li class="package-video">4h Video coverage </li>
                                <li class="package-drone">2h Drone coverage</li>
                                <li class="package-touch">Retouching </li>
                            </ul>
                            <a class="btn btn-white-border btn-sm book-now mb-30">Book now</a>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="package-item">
                            <h1 class="package-title">
                                Platinum
                            </h1>
                            <ul class="package-list">
                                <li class="package-photo">8h Photo coverage </li>
                                <li class="package-video">6h Video coverage </li>
                                <li class="package-drone">3h Drone coverage</li>
                                <li class="package-touch">Retouching </li>
                            </ul>

                            <a class="btn btn-white-border btn-sm book-now mb-30">Book now</a>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="package-item">
                            <h1 class="package-title">
                                Diamond
                            </h1>
                            <ul class="package-list">
                                <li class="package-photo">8h Photo coverage </li>
                                <li class="package-video">8h Video coverage </li>
                                <li class="package-drone">4h Drone coverage</li>
                                <li class="package-touch">Retouching </li>
                            </ul>

                            <a class="btn btn-white-border btn-sm book-now mb-30">Book now</a>

                        </div>
                    </div>
                </div>
                <!--./row-->
            </div>
            <!--./packages-item-list-->

        </div>

    </section>
    <!-- ./packages-->

    <section class="contact">

        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-4 col-md-offset-1 col-lg-3 col-lg-offset-1">
                    <div class="contact-info">
                        <h1 class="font600">Please contact us </h1>
                        <p>We appreciate every client and can make your dreams come true!<br />Do not hesitate to contact us. </p>
                        <div class="contact-box">
                            <ul>
                                <li class="location"><a href="#">385 Noah Place Suite 878</a></li>
                                <li class="telephone"><a href="tel:8772557945">877-255-7945</a></li>
                                <li class="email"><a href="mailto:info@form.com">info@form.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-6 col-md-offset-1 col-lg-4 col-lg-offset-1">

                    <form role="form" class="contact-form">
                        <h4 class="text-upper font700 mb-30">SEND US MESSAGE </h4>

                        <h1 class="text-upper"></h1>
                        <div class="form-group">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Your Name" id="name" required />
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Your Email" id="email" required />
                        </div>
                        <div class="form-group">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" placeholder="Your Message" id="message" required></textarea>
                        </div>
                        <input type="submit" class="btn btn-green btn-block" value="Submit" />
                    </form>
                </div>
            </div>
            <!--./row-->

        </div>


        <div class="contact-image">
            <img src="/assets/landing/images/contact-img.jpg" />
        </div>

    </section>
    <!-- ./contact-->


    <section class="subscribe">

        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                    <form role="form" class="subscribe-form">
                        <h4 class="text-center font700">Subscribe for updates</h4>
                        <div class="row">
                            <div class="col-xs-12 col-sm-7 col-sm-offset-1">
                                <input type="text" class="form-control fc-sm mb-10" placeholder="Your Email" required />
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <input type="submit" class="btn btn-green btn-sm btn-block mb-10" value="Subscribe" />
                            </div>
                        </div>
                        <!--./row-->
                        <p class="small text-center color-grey mb-0">We value your privacy. None of the details supplied will be shared with external parties</p>
                    </form>
                </div>
            </div>
            <!--./row-->

        </div>


    </section>
    <!-- ./subscribe-->


    <footer class="footer">

        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <a href="#" class="logo-footer"></a>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <ul class="footer-list">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">What we offer?</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="#">Testimonials{{$role}}</a></li>
                        @if(isset($role))
                            @if($role == 'admin')
                                <li><a href="{{route('panel.admin.file')}}">Admin</a></li>
                            @elseif($role == 'customer')
                                <li><a href="{{route('panel.customer')}}">My panel</a></li>
                            @else
                                <li><a href="{{route('auth.sign_in')}}">Login</a></li>
                            @endif
                        @endif
                    </ul>

                </div>
            </div>
            <!--./row-->

            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <p class="color-grey  mt-10">2019 &copy; test IO. All right reserved.</p>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <ul class="social-networks">
                        <li><a href="#" class="facebook"></a></li>
                        <li><a href="#" class="instagram"></a></li>
                        <li><a href="#" class="youtube"></a></li>
                    </ul>
                </div>
            </div>
            <!--./row-->

        </div>


    </footer>
    <!-- ./footer-->

    <div class="modal-hero-image">
        <a class="modal-close"><span></span></a>
        <img src="/assets/landing/images/hero-img.jpg" />
    </div>
    <!-- ./modal-hero-image-->

    <!-- jQuery -->
    <script src="/assets/landing/js/jquery-1.11.1.min.js"></script>

    <!-- OWL Carouesel -->
    <script src="/assets/landing/owl/js/owl.carousel.min.js"></script>
    <script src="/assets/landing/owl/js/owl.carousel-init.js"></script>

    <!-- Custom Script  -->
    <script src="/assets/landing/js/main.js"></script>

</body>

</html>
