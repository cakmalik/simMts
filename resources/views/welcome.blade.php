<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Webpixels">
    <title>MTSMU 2 BAKID</title>
    <!-- Preloader -->
    <style>
        @keyframes hidePreloader {
            0% {
                width: 100%;
                height: 100%;
            }

            100% {
                width: 0;
                height: 0;
            }
        }

        body>div.preloader {
            position: fixed;
            background: white;
            width: 100%;
            height: 100%;
            z-index: 1071;
            opacity: 0;
            transition: opacity .5s ease;
            overflow: hidden;
            pointer-events: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body:not(.loaded)>div.preloader {
            opacity: 1;
        }

        body:not(.loaded) {
            overflow: hidden;
        }

        body.loaded>div.preloader {
            animation: hidePreloader .5s linear .5s forwards;
        }

    </style>
    <script>
        window.addEventListener("load", function() {
            setTimeout(function() {
                document.querySelector('body').classList.add('loaded');
            }, 300);
        });

    </script>
    <!-- Favicon -->
    <link rel="icon" href="/assets/welcomepage/img/brand/favicon.ico" type="image/png"><!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/welcomepage/libs/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Quick CSS -->
    <link rel="stylesheet" href="/assets/welcomepage/css/quick-website.css" id="stylesheet">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="spinner-border text-success" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>



    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <!-- Brand -->
            {{-- <a class="navbar-brand" href="index.html">
                <img alt="Image placeholder" src="/assets/welcomepage/img/brand/dark.svg" id="navbar-logo">
            </a> --}}
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collapse -->

            @if (Route::has('login'))
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    @auth
                        <ul class="navbar-nav mt-4 mt-lg-0 ml-auto">
                            <li class="nav-item ">
                                <a href="{{ url('/home') }}" class="navbar-nav mt-4 mt-lg-0 ml-auto">Home</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav mt-4 mt-lg-0 ml-auto">
                            <li class="nav-item ">
                                <a href="{{ route('login') }}" class="navbar-nav mt-4 mt-lg-0 ml-auto">Masuk</a>
                            </li>
                        </ul>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="navbar-btn btn btn-sm btn-success d-none d-lg-inline-block ml-3">Mendaftar</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>
    <!-- Main content -->
    <section class="slice py-7">
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-12 col-md-5 col-lg-6 order-md-2 text-center">
                    <!-- Image -->
                    <figure class="w-100">
                        <img alt="Image placeholder" src="/assets/welcomepage/img/svg/illustrations/illustration-3.svg"
                            class="img-fluid mw-md-120">
                    </figure>
                </div>
                <div class="col-12 col-md-7 col-lg-6 order-md-1 pr-md-5">
                    <!-- Heading -->
                    <h1 class="display-4 text-center text-md-left mb-3">
                        MTSMU 2 <strong class="text-success">BAKID</strong>
                    </h1>
                    <!-- Text -->
                    <p class="lead text-center text-md-left text-muted">
                        Terwujudnya Generasi Muslim yang Unggul dalam Imtaq, Iptek dan Akhlak Al-karimah
                    </p>
                    <!-- Buttons -->
                    <div class="text-center text-md-left mt-5">
                        <a href="{{ route('register') }}" class="btn btn-success btn-icon">
                            <span class="btn-inner--text">Mendaftar</span>
                            <span class="btn-inner--icon"><i data-feather="chevron-right"></i></span>
                        </a>
                        <a href="{{ route('login') }}"
                            class="btn btn-neutral btn-icon d-none d-lg-inline-block">Masuk</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core JS  -->
    <script src="/assets/welcomepage/libs/jquery/dist/jquery.min.js"></script>
    <script src="/assets/welcomepage/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/welcomepage/libs/svg-injector/dist/svg-injector.min.js"></script>
    <script src="/assets/welcomepage/libs/feather-icons/dist/feather.min.js"></script>
    <!-- Quick JS -->
    <script src="/assets/welcomepage/js/quick-website.js"></script>
    <!-- Feather Icons -->
    <script>
        feather.replace({
            'width': '1em',
            'height': '1em'
        })

    </script>
</body>

</html>
