<!--  -->
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/digilab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2024 02:06:06 GMT -->

<head>
    <title>Landing </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('frontend/css/open-iconic-bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">



    {{-- <link rel="stylesheet" href="https://code.jquery.com/jquery-3.6.0.min.js"> --}}

    <script nonce="11646224-9a08-430c-a398-ced2b388af53">
        try {
            (function(w, d) {
                ! function(j, k, l, m) {
                    j[l] = j[l] || {};
                    j[l].executed = [];
                    j.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    j.zaraz._v = "5621";
                    j.zaraz.q = [];
                    j.zaraz._f = function(n) {
                        return async function() {
                            var o = Array.prototype.slice.call(arguments);
                            j.zaraz.q.push({
                                m: n,
                                a: o
                            })
                        }
                    };
                    for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
                    j.zaraz.init = () => {
                        var q = k.getElementsByTagName(m)[0],
                            r = k.createElement(m),
                            s = k.getElementsByTagName("title")[0];
                        s && (j[l].t = k.getElementsByTagName("title")[0].text);
                        j[l].x = Math.random();
                        j[l].w = j.screen.width;
                        j[l].h = j.screen.height;
                        j[l].j = j.innerHeight;
                        j[l].e = j.innerWidth;
                        j[l].l = j.location.href;
                        j[l].r = k.referrer;
                        j[l].k = j.screen.colorDepth;
                        j[l].n = k.characterSet;
                        j[l].o = (new Date).getTimezoneOffset();
                        if (j.dataLayer)
                            for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                                    ...x[1],
                                    ...y[1]
                                })), {}))) zaraz.set(w[0], w[1], {
                                scope: "page"
                            });
                        j[l].q = [];
                        for (; j.zaraz.q.length;) {
                            const z = j.zaraz.q.shift();
                            j[l].q.push(z)
                        }
                        r.defer = !0;
                        for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C
                            .startsWith("_zaraz_"))).forEach((B => {
                            try {
                                j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
                            } catch {
                                j[l]["z_" + B.slice(7)] = A.getItem(B)
                            }
                        }));
                        r.referrerPolicy = "origin";
                        r.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l])));
                        q.parentNode.insertBefore(r, q)
                    };
                    ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>

    <style>
        .button-success {
            background-color: transparent;
            border: 2px solid #28a745;
            /* Warna hijau */
            color: #28a745;
            /* Warna hijau */
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .button-success:hover {
            background-color: #28a745;
            /* Warna hijau */
            color: white;
            /* Teks putih saat hover */
        }

        .button {
            color: green;
        }

        .button:hover {
            color: white;
        }
    </style>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target"
        id="ftco-navbar">
        <div class="container">
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
                data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <!-- Tombol di atas navbar -->
            <button style="position:relative; right: -1100px; border-radius:5px; border: 2px solid green;"
                class="btn btn-outline-success"><a style="color: black" href="{{ route('login') }}">Masuk</a></button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item"><a href="#home-section" class="nav-link"><span>Beranda</span></a></li>
                    <li class="nav-item"><a href="#projects-section" class="nav-link"><span>Proyek</span></a></li>
                    <li class="nav-item"><a href="#about-section" class="nav-link"><span>Tentang kami</span></a></li>
                    <li class="nav-item"><a href="#testimony-section" class="nav-link"><span>Testimony</span></a></li>
                    <li class="nav-item"><a href="#blog-section" class="nav-link"><span>Blog</span></a></li>
                    <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Kontak</span></a></li>
                </ul>
            </div>
        </div>
    </nav>


    <section id="home-section" class="hero">
        {{-- <h3 class="vr">Welcome to DigiLab</h3> --}}
        <div class="home-slider js-fullheight owl-carousel">
            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
                        data-scrollax-parent="true">
                        <div class="one-third order-md-last img js-fullheight"
                            style="background-image:url('{{ asset('frontend/images/bg_1.jpg') }}');">
                            <div class="overlay"></div>
                        </div>
                        <div class="one-forth d-flex js-fullheight align-items-center ftco-animate"
                            data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span style="color: black; font-size: 20px;">Selamat datang di </span><span
                                    style="font-size:23px; color: crimson"> </span>
                                <h1 class="mb-4 mt-3">Detail kecil membuat <span> kesan besar
                                    </span>
                                </h1>
                                <p><a href="{{ route('login') }}" class="btn btn-primary px-5 py-3 mt-3">Masuk</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
                        data-scrollax-parent="true">
                        <div class="one-third order-md-last img js-fullheight"
                            style="background-image:url('{{ asset('frontend/images/bg_2.jpg') }}');">
                            <div class="overlay"></div>
                        </div>

                        <div class="one-forth d-flex js-fullheight align-items-center ftco-animate"
                            data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span style="color: black; font-size: 20px;">Selamat datang di </span>
                                <h1 class="mb-4 mt-3"><span>Kosan</span> Murah Tapi Gak <span>murahan</span>
                                </h1>
                                <p><a href="{{ route('login') }}" class="btn btn-primary px-5 py-3 mt-3">Masuk</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 col-lg-5 d-flex">
                    <div class="img d-flex align-self-stretch align-items-center"
                        style="background-image:url('{{ asset('frontend/images/about.jpg') }}');">
                    </div>
                </div>
                <div class="col-md-6 col-lg-7 pl-lg-5 py-5">
                    <div class="py-md-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate">
                                {{-- <span class="subheading">Welcome to digilab</span> --}}
                                <h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">We Are Digital
                                    Agency</h2>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                    unorthographic life One day however a small line of blind text by the name of Lorem
                                    Ipsum decided to leave for the far World of Grammar.</p>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.</p>
                            </div>
                        </div>
                        <div class="counter-wrap ftco-animate d-flex mt-md-3">
                            <div class="text p-4 bg-primary">
                                <p class="mb-0">
                                    <span class="number" data-number="20">0</span>
                                    <span>Years of experience</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-6 heading-section text-center ftco-animate">
                    <span class="subheading">About Us</span>
                    <h2 class="mb-4">Our Staff</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch"
                                style="background-image: url('{{ asset('frontend/images/staff-1.jpg') }}');"></div>
                        </div>

                        <div class="text d-flex align-items-center pt-3 text-center">
                            <div>
                                <h3 class="mb-2">Lloyd Wilson</h3>
                                <span class="position mb-4">CEO, Founder</span>
                                <div class="faded">
                                    <ul class="ftco-social text-center">
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-twitter"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-facebook"></span></a></li>
                                        <li class="ftco-animate"><a href=""><span
                                                    class="icon-google-plus"></span></a></li>
                                        <li class="ftco-animate"><a href=""><span
                                                    class="icon-instagram"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch"
                                style="background-image: url('{{ asset('frontend/images/staff-2.jpg') }});"></div>
                        </div>
                        <div class="text d-flex align-items-center pt-3 text-center">
                            <div>
                                <h3 class="mb-2">Rachel Parker</h3>
                                <span class="position mb-4">Web Designer</span>
                                <div class="faded">
                                    <ul class="ftco-social text-center">
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-twitter"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-facebook"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-google-plus"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-instagram"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch"
                                style="background-image: url('{{ asset('frontend/images/staff-3.jpg') }}');"></div>
                        </div>
                        <div class="text d-flex align-items-center pt-3 text-center">
                            <div>
                                <h3 class="mb-2">Ian Smith</h3>
                                <span class="position mb-4">Web Developer</span>
                                <div class="faded">
                                    <ul class="ftco-social text-center">
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-twitter"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-facebook"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-google-plus"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-instagram"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch"
                                style="background-image: url('{{ asset('frontend/images/staff-4.jpg') }}');"></div>
                        </div>
                        <div class="text d-flex align-items-center pt-3 text-center">
                            <div>
                                <h3 class="mb-2">Alicia Henderson</h3>
                                <span class="position mb-4">Graphic Designer</span>
                                <div class="faded">
                                    <ul class="ftco-social text-center">
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-twitter"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-facebook"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-google-plus"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-instagram"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section testimony-section" id="testimony-section">
        <div class="container">
            <div class="row justify-content-center pb-3">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2 class="mb-4">Happy Clients</h2>
                </div>
            </div>
            <div class="row ftco-animate justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap text-center py-4 pb-5">
                                <div class="user-img"
                                    style="background-image: url('{{ asset('frontend/images/person_1.jpg') }}')">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text px-4 pb-5">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">John Fox</p>
                                    <span class="position">Businessman</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center py-4 pb-5">
                                <div class="user-img"
                                    style="background-image: url('{{ asset('frontend/images/person_2.jpg') }}')">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text px-4 pb-5">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">John Fox</p>
                                    <span class="position">Businessman</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center py-4 pb-5">
                                <div class="user-img"
                                    style="background-image: url('{{ asset('frontend/images/person_3.jpg') }}')">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text px-4 pb-5">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">John Fox</p>
                                    <span class="position">Businessman</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center py-4 pb-5">
                                <div class="user-img"
                                    style="background-image: url('{{ asset('frontend/images/person_4.jpg') }}')">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text px-4 pb-5">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">John Fox</p>
                                    <span class="position">Businessman</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center py-4 pb-5">
                                <div class="user-img"
                                    style="background-image: url('{{ asset('frontend/images/person_3.jpg') }}')">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text px-4 pb-5">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">John Fox</p>
                                    <span class="position">Businessman</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section bg-light" id="blog-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Blog</span>
                    <h2 class="mb-4">Our Blog</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="single.html" class="block-20"
                            style="background-image: url('{{ asset('frontend/images/image_1.jpg') }}');">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <div class="d-flex align-items-center pt-2 mb-4 topp">
                                <div class="one mr-2">
                                    <span class="day">12</span>
                                </div>
                                <div class="two">
                                    <span class="yr">2019</span>
                                    <span class="mos">March</span>
                                </div>
                            </div>
                            <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                    Growth</a></h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                            <div class="d-flex align-items-center mt-4 meta">
                                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                            class="ion-ios-arrow-round-forward"></span></a></p>
                                <p class="ml-auto mb-0">
                                    <a href="#" class="mr-2">Admin</a>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="single.html" class="block-20"
                            style="background-image: url('{{ asset('frontend/images/image_2.jpg') }}');">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <div class="d-flex align-items-center pt-2 mb-4 topp">
                                <div class="one mr-2">
                                    <span class="day">10</span>
                                </div>
                                <div class="two">
                                    <span class="yr">2019</span>
                                    <span class="mos">March</span>
                                </div>
                            </div>
                            <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                    Growth</a></h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                            <div class="d-flex align-items-center mt-4 meta">
                                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                            class="ion-ios-arrow-round-forward"></span></a></p>
                                <p class="ml-auto mb-0">
                                    <a href="#" class="mr-2">Admin</a>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry">
                        <a href="single.html" class="block-20"
                            style="background-image: url('{{ asset('frontend/images/image_3.jpg') }}');">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <div class="d-flex align-items-center pt-2 mb-4 topp">
                                <div class="one mr-2">
                                    <span class="day">05</span>
                                </div>
                                <div class="two">
                                    <span class="yr">2019</span>
                                    <span class="mos">March</span>
                                </div>
                            </div>
                            <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                    Growth</a></h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                            <div class="d-flex align-items-center mt-4 meta">
                                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                            class="ion-ios-arrow-round-forward"></span></a></p>
                                <p class="ml-auto mb-0">
                                    <a href="#" class="mr-2">Admin</a>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">

            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span style="color: crimson; ">Kontak</span>
                    <h2 class="mb-4">Kontak kami</h2>
                    {{-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> --}}
                </div>
            </div>

            <div class="row d-flex contact-info mb-5">
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-map-signs"></span>
                        </div>
                        <h3 class="mb-4">Alamat</h3>
                        <p><a
                                href="https://www.google.com/maps/place/Karyain+Laundry+Cinambo/@-6.9228121,107.6847081,17z/data=!3m1!4b1!4m6!3m5!1s0x2e68e7a60132d0d7:0xcfaf9cca6ca22773!8m2!3d-6.9228166!4d107.6868733!16s%2Fg%2F11y1wmpj1_!5m1!1e1?entry=ttu&g_ep=EgoyMDI0MTAwOS4wIKXMDSoASAFQAw%3D%3D"></a>
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-phone2"></span>
                        </div>
                        <h3 class="mb-4">WhatsApp</h3>
                        <p><a
                                href="https://api.whatsapp.com/send?phone=&text=Haloo%20kak,%20apa%20masih%20tersedia%20kamarnya?"></a>
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-paper-plane"></span>
                        </div>
                        <h3 class="mb-4">Email</h3>
                        <p><a href="#"><span> </span></a>
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-left">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-globe"></span>
                        </div>
                        <h3 class="mb-4 text-center">Website</h3>
                        <p>- <a href="https://kost.karyain.co.id/">Kost karyain</a></p>
                        <p>- <a href="#">Inventory Karyain Kost</a></p>
                        <p>- <a href="https://digital.karyain.co.id/">Karyain Digital</a></p>
                        <p>- <a href="https://karyainlaundry.com/">Karyain Laundry</a></p>
                        <p>- <a href="http://merchandise.karyain.co.id/">Karyain Merchandise</a></p>
                    </div>
                </div>
            </div>

            <div class="row no-gutters block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="#" class="bg-light p-5 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name id cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex">
                    <div id="map" class="bg-white"></div>
                </div>
            </div>
        </div>
    </section>

    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Tentang </h2>
                        <p style="color:aliceblue;">Terletak dekat dengan perkampusan dan perkantoran serta fasilitas
                            yang lengkap kami menawarkan
                            berbagai tipe kamar yang dapat disesuaikan dengan kebutuhanmu sobat.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="http://instagram.com/karyainkost"><span
                                        class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Link</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Beranda</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Tentang Kami</a>
                            </li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Layanan</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Masuk</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Kontak</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Layanan</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Web Design</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Web Development</a>
                            </li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Business
                                    Strategy</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Data Analysis</a>
                            </li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Graphic Design</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Punya Pertanyaan</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><a
                                        href="https://api.whatsapp.com/send?phone=&text=Haloo%20kak,%20apa%20masih%20tersedia%20kamarnya?"><span
                                            class="icon icon-phone"></span><span class="text">+
                                        </span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">
                                            <span class="__cf_email__">
                                            </span></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright &copy;
                        <script data-cfasync="false" src="{{ asset('frontend/js/email-decode.min.js') }}"></script>
                        <script>
                            document.write(new Date().getFullYear());
                        </script> <i class="icon-heart color-danger" aria-hidden="true"></i> Dari <a
                            href="https://instagram.com/famz_129" target="_blank"> <span
                                style="Hover: color: blue;">Fahmi</span></a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false">
    </script>
    <script src="{{ asset('frontend/js/google-map.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vedd3670a3b1c4e178fdfb0cc912d969e1713874337387"
        integrity="sha512-EzCudv2gYygrCcVhu65FkAxclf3mYM6BCwiGUm6BEuLzSb5ulVhgokzCZED7yMIkzYVg65mxfIBNdNra5ZFNyQ=="
        data-cf-beacon='{"rayId":"87fda616df32834b","b":1,"version":"2024.4.1","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#numberInput').on('span', function() {
                let input = $(this).val().replace(/[^0-9]/g, ''); // Hapus semua selain angka
                if (input.length > 4) {
                    input = input.replace(/(\d{4})(\d+)/, '$1-$2'); // Tambahkan '-' setelah 4 angka
                }
                $(this).val(input); // Update nilai input
            });
        });
    </script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/digilab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2024 02:06:25 GMT -->

</html>
