<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Quản lý thu nộp hồ sơ về Văn Phòng Đảng ủy">


    <title>VĂN PHÒNG ĐẢNG ỦY</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="public/disk2/images/Logo-dang.png" />

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="public/disk2/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="public/disk2/plugins/icofont/icofont.min.css">
    <!-- Slick Slider  CSS -->
    <link rel="stylesheet" href="public/disk2/plugins/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="public/disk2/plugins/slick-carousel/slick/slick-theme.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="public/disk2/css/style.css">

</head>

<header>
    <div class="header-top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="top-bar-info list-inline-item pl-0 mb-0">
                        <li class="list-inline-item"><a href="mailto:vanphong_danguy@hcmute.edu.vn"><i
                                    class="icofont-support-faq mr-2"></i>vanphong_danguy@hcmute.edu.vn</a></li>
                        <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Tầng 10 - Tòa nhà Trung
                            tâm </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
                        <a href="tel:028.37221223">
                            <span>Liên hệ : </span>
                            <span class="h4">028.37221223 (8231)</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navigation" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="https://vanphongdanguy.hcmute.edu.vn/">
                <img src="public/disk2/images/LOGO-CO-BAC-HO.png" alt="" class="img-fluid">
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
                aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icofont-navigation-menu"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="https://vanphongdanguy.hcmute.edu.vn/">Trang chủ</a>
                    </li>
                    <a class="nav-link active" aria-current="page" href="<?= route('enter_profile') ?>">Nhập thông tin
                        hồ sơ</a>
                    <a class="nav-link" href="<?= route('search_profile') ?>">Tra cứu thông tin hồ sơ</a>
            </div>
        </div>
    </nav>
</header>

<body>

    <!-- Slider Start -->
    <section class="banner">
    </section>
    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-block d-lg-flex">
                        <div class="feature-item mb-5 mb-lg-0">
                            <div class="feature-icon mb-4">
                                <i class="icofont-world"></i>
                            </div>
                            <h4 class="mb-3  text-align: center;">VĂN PHÒNG ĐẢNG ỦY TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT TP.
                                HỒ CHÍ MINH</h4>
                        </div>

                        <div class="feature-item mb-5 mb-lg-0">
                            <div class="feature-icon mb-4">
                                <i class="icofont-ui-clock"></i>
                            </div>
                            <h4 class="mb-3">Giờ Làm Việc</h4>
                            <span>Thứ Hai - Thứ Sáu</span>
                            <ul class="w-hours list-unstyled">
                                <li class="d-flex justify-content-between">Buổi sáng : <span>07:30 - 11:30</span></li>
                                <li class="d-flex justify-content-between">Buổi chiều : <span>13:30 - 17:30</span></li>
                            </ul>
                        </div>

                        <div class="feature-item mb-5 mb-lg-0">
                            <div class="feature-icon mb-4">
                                <i class="icofont-support"></i>
                            </div>
                            <h4 class="mb-3">Chuyên Trách Đảng</h4>
                            <p>Đ/c Phan Công Đức (096.115.9192) </p>
                            <p>Đ/c Nguyễn Thị Phương Nam (098.719.9792) </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="copyright text-center">
                &copy; Copyright to <a href="https://dangbo.hcmute.edu.vn/" target="_blank">Văn phòng Đảng ủy</a>
            </div>
        </div>
    </section>

    <!-- Main jQuery -->
    <script src="public/disk2/plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="public/disk2/plugins/bootstrap/js/popper.js"></script>
    <script src="public/disk2/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/disk2/plugins/counterup/jquery.easing.js"></script>
    <!-- Slick Slider -->
    <script src="public/disk2/plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="public/disk2/plugins/counterup/jquery.waypoints.min.js"></script>

    <script src="public/disk2/plugins/shuffle/shuffle.min.js"></script>
    <script src="public/disk2/plugins/counterup/jquery.counterup.min.js"></script>
    <!-- Google Map -->
    <script src="public/disk2/plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap">
    </script>

    <script src="js/script.js"></script>
    <script src="js/contact.js"></script>

</body>

</html>