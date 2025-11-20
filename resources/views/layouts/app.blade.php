<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SNK Wellness Center | {{$title}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta name="description" content="Wellness Workshops Expert-Led Exercise Programs Personalized Health Assessments Cooking Classes Tailored Meal Plans Healthy Juices Your wellness Starts Now! Comprehensive Wellness Solutions for a Healthier You Discover Your Path to Holistic Health at SNK Wellness Center! Welcome to SNK Wellness Center, where your journey to optimal health begins! Our comprehensive services are designed to help">
    <meta property="og:description" content="Wellness Workshops Expert-Led Exercise Programs Personalized Health Assessments Cooking Classes Tailored Meal Plans Healthy Juices Your wellness Starts Now! Comprehensive Wellness Solutions for a Healthier You Discover Your Path to Holistic Health at SNK Wellness Center! Welcome to SNK Wellness Center, where your journey to optimal health begins! Our comprehensive services are designed to help">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/storage/front/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="/storage/front/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="/storage/front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/storage/front/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-phone me-2 text-secondary"></i> <a href="#" class="text-white">+254 745 878 245</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">info@snkwellnesscenter.co.ke</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                    <a href="" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                    <a href="" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="/" class="navbar-brand">
                    <img src="/storage/front/img/logo.png" style="width:30%;" alt="">
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto fw-bold">
                        <a href="/" class="nav-item nav-link active">Home</a>
                        <a href="/shop" class="nav-item nav-link">Shop</a>
                        <a href="/contact" class="nav-item nav-link">Contact</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="/meal-plans" class="dropdown-item">Meal Plans</a>
                                <a href="/wellness-workshop" class="dropdown-item">Wellness Workshops</a>
                                <a href="/health-talks" class="dropdown-item">Health talks</a>
                                <a href="/cooking-class" class="dropdown-item">Cooking Classes</a>
                                <a href="/healthy-juices" class="dropdown-item">Health Juices</a>
                            </div>
                        </div>
                        <a href="/about" class="nav-item nav-link">About</a>
                    </div>
                    <div class="d-flex m-3 me-0">
                        <a href="/carts" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                                @auth
                                {{App\Models\Cart::where('user_id',Auth()->user()->id)->count()}}
                                @else
                                0
                                @endauth
                            </span>
                        </a>
                        <a href="/{{Auth()->user()?'dashboard':'login'}}" class="my-auto">
                            <i class="fa fa-user-circle fa-2x"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <div class="container-fluid page-header">

        <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
            <div class="container-fluid">
                
                @yield('content')
            </div>
        </div>
    </div>


    <!-- Footer Start -->
    <div class="container-fluid text-white-50 footer pt-5 mt-5" style="background-color: black;">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#">
                            <img src="/storage/front/img/logo.png" style="width:100%;" alt="">
                            <p class="text-secondary mb-0">Fresh Healthy Products</p>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <form action="/subscribe" method="post">
                            @csrf
                            <div class="position-relative mx-auto">
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                                <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex justify-content-end pt-3">
                            <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-md-4">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Our Mission!</h4>
                        <p class="mb-4">To provide holistic, personalized wellness solutions that empower clients to achieve optimal health and well-being through compassionate care, and a supportive community</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Our Vision</h4>
                        <p class="mb-3">To be a leading nutrition and wellness center that transforms lives by inspiring and educating clients to take charge of their health journeys</p>
                        <h4 class="text-light mb-3">Contact</h4>
                        <p>Email: info@snkwellnesscenter.co.ke</p>
                        <p>Phone: +254 745 878 245</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Quick Links</h4>
                        <a class="btn-link" href="/dashboard">My Account</a>
                        <a class="btn-link" href="/shop">Shop details</a>
                        <a class="btn-link" href="/carts">Shopping Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>SNK Wellness Center</a>, All right reserved.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    Designed By <a class="border-bottom" href="https://apektechinc.com">APEK TECH INC</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/storage/front/lib/easing/easing.min.js"></script>
    <script src="/storage/front/lib/waypoints/waypoints.min.js"></script>
    <script src="/storage/front/lib/lightbox/js/lightbox.min.js"></script>
    <script src="/storage/front/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/storage/front/js/main.js"></script>
</body>

</html>