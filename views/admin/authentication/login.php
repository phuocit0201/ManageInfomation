<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="author" content="MatrrDigital">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="robots" content="noindex, nofollow">
  <title>Login | Quản lý Hồ sơ đến</title>
  <link rel="shortcut icon" href="public/asset/logo-hcmute.png" type="image/x-icon" />
  <base href="<?= base ?>">
  <!-- ================== BEGIN PAGE LEVEL CSS START ================== -->
  <link rel="stylesheet" href="public/asset/owl.carousel.min.css" />
  <!-- ================== BEGIN PAGE LEVEL END ================== -->
  <!-- ================== Plugins CSS  ================== -->
  <link rel="stylesheet" href="public/asset/owl.carousel.min.css" />
  <!-- ================== Plugins CSS end ================== -->
  <!-- ================== BEGIN APP CSS  ================== -->
  <link rel="stylesheet" href="public/asset/bootstrap.min.css" />
  <link rel="stylesheet" href="public/asset/styles.min.css">
  <!-- ================== END APP CSS ================== -->
</head>

<body>
  <!-- Begin Page -->
  <div class="auth-pages">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-11 col-xl-10">
          <div class="row justify-content-center">
            <div class="col-md-6 pe-md-0">
              <div class="auth-page-sidebar overflow-hidden">
                <div class="overlay"> 
                <img src="public/asset/hinh3.png" height="800" alt="Lettstart Admin">
                </div>
                <div class="auth-user-testimonial">
                  <div class="owl-carousel">
                  <div class="item" style="color: red;">
                    <h3 class="text-white mb-1" style="color: red !important;">Welcome Admin!</h3>
                    <h5 class="text-white mb-3" style="color: #014EC4 !important;">"Chào mừng Bạn đến với Trang quản lý Văn bản đến của Văn phòng Đảng ủy
                      Trường Đại học Sư phạm Kỹ thuật TP. Hồ Chí Minh"</h5>
                    <p style="color: red;">- Văn phòng Đảng ủy -</p>
                  </div>
                  <div class="item" style="color: red;">
                    <h3 class="text-white mb-1" style="color: red !important;">Bye Bye User!</h3>
                    <h5 class="text-white mb-3" style="color: #014EC4 !important;">"Chúng tôi rất lấy làm tiếc khi bạn không thể truy cập vào Trang quản lý này
                      . Mọi thắc mắc bạn có thể liên hệ Văn phòng Đảng ủy để được giải quyết trực tiếp nhé ! "</h5>
                    <p style="color: red;">- Văn phòng Đảng ủy -</p>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 ps-md-0">
              <div class="card mb-0 p-2 p-md-3 border-bl-radius-0 border-tl-radius-0">
                <div class="card-body">
                  <div class="clearfix">
                    <img src="public/asset/logo-hcmute.png" height="300" alt="Lettstart Admin">
                  </div>
                  <div style="display: flex; justify-content: center;">
                    <h5 class="mt-4 fw-semibold" style="color: red !important;">Welcome Admin!</h5>
                  </div>
                  <form action="<?=route('login')?>" method="post" id="loginForm" novalidate>
                    <div class="form-group floating-label">
                      <input type="email" class="form-control form-control-lg" name="username" id="email" />
                      <label for="email">Username</label>
                    </div>
                    <div class="form-group floating-label">
                      <input type="password" class="form-control form-control-lg" name="password" id="password" />
                      <label for="password">Password</label>
                    </div>

                    <div class="form-group text-center d-grid">
                      <button class="btn btn-primary" data-effect="wave" type="submit"> Log In
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </div>
  <!-- Page End -->
   <!-- ================== BEGIN BASE JS ================== -->
   <script src="public/asset/vendor.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <!-- ================== END BASE JS ================== -->

  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="public/asset/colors.js"></script>
  <script src="public/asset/owl.carousel.min.js"></script>
  <script src="public/asset/jquery.validate.min.js"></script>
  <script src="public/asset/additional-methods.min.js"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->
  <!-- ================== BEGIN PAGE JS ================== -->
  <script src="public/asset/app.js"></script>
  <!-- ================== END PAGE JS ================== -->
  <script>
    $(".auth-user-testimonial .owl-carousel").owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      dots: false,
      autoplay: true,
      autoplayTimeout: 4000,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    });
  
  </script>
</body>

</html>