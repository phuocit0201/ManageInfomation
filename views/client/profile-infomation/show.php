<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐẢNG ỦY | TRA CỨU HỒ SƠ</title>
    <link rel="stylesheet" href="<?= base ?>/public/build/css/client/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="public/disk2/images/Logo-dang.png" />
    <meta property="og:image" content="https://vanphongdanguy.yhcmute.com/public/images/thumbanail-website.svg">
    <meta property="og:image:secure_url" content="https://vanphongdanguy.yhcmute.com/public/images/thumbanail-website.svg">
    <meta property="og:image:width" content="1280px"> <!-- Chiều rộng của ảnh -->
    <meta property="og:image:height" content="720px"> <!-- Chiều cao của ảnh -->
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
                        <li class="list-inline-item"><a href="mailto:vanphong_danguy@hcmute.edu.vn"><i class="icofont-support-faq mr-2"></i>vanphong_danguy@hcmute.edu.vn</a></li>
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

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="container w-100">
        <form action="<?= base ?>tra-cuu-thong-tin" method="GET">
            <fieldset>
                <div class="text-center">
                    <img style="width: 100%;" src="public/images/van-phong-dien-tu-nen-do-16.svg" alt="" srcset="">
                    <h3 class="my-5 text-primary fw-bolder;">TRA CỨU TÌNH TRẠNG HỒ SƠ ĐÃ NỘP VỀ VĂN PHÒNG ĐẢNG ỦY</h3>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" value="<?= $data["keyword"] ?? '' ?>" required placeholder="Nhập mã hồ sơ hoặc số điện thoại">
                    <button type="submit" class="input-group-text btn-primary">Tra cứu</button>
                </div>
            </fieldset>
        </form>
        <?php
        if (isset($data["profiles"]) && empty($data["profiles"]) && isset($data["keyword"])) { ?>
            <h2 class="text-danger text-center">KHÔNG TÌM THẤY HỒ SƠ</h2>
        <?php
        } else if (isset($data["profiles"]) && count($data["profiles"]) > 1 && isset($data["keyword"])) {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Mã hồ sơ</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data["profiles"] as $profile) { ?>
                        <tr>
                            <th scope="row"><?= $profile['id'] ?></th>
                            <td><?= $profile['full_name'] ?></td>
                            <td><?= $profile['phone_number'] ?></td>
                            <td><?= $profile['email'] ?></td>
                            <td><a class="btn btn-primary" href="?search=<?= $profile['id'] ?>"><i class="far fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php
        } else if (isset($data["profiles"]) && !empty($data["profiles"]) && isset($data["keyword"])) {
        ?>
            <h4 class="strong-heading">Thông tin hồ sơ</h4>
            <div class=" row p-4 m-0 mb-4 bg-light bg-gradient border rounded shadow">
                <div class="col-md-3">
                    <div class="row">
                        <b class="col-md-12 col-5">Họ và tên</b>
                        <p class="col-md-12 col-7 text-nowrap"><?= $data["profiles"][0]["full_name"] ?></p>
                    </div>
                    <!-- <div class="row">
                        <b class="col-md-12 col-5">Số điện thoại</b>
                        <p class="col-md-12 col-7 text-nowrap"><?= $data["profiles"][0]["phone_number"] ?></p>
                    </div> -->
                    <div class="row">
                        <b class="col-md-12 col-5">Email</b>
                        <p class="col-md-12 col-7 text-nowrap"><?= $data["profiles"][0]["email"] ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <b class="col-md-12 col-5">Đơn vị</b>
                        <p class="col-md-12 col-7 text-nowrap"><?= $data["profiles"][0]["organization"] ?></p>
                    </div>
                    <div class="row">
                        <b class="col-md-12 col-5">Chi bộ</b>
                        <p class="col-md-12 col-7 text-nowrap"><?= $data["profiles"][0]["branch"] ?></p>
                    </div>
                </div>

                <div class="col-md-3" style="display: block;">
                    <div class="row" style="display: block; overflow: hidden; max-height: 100px;">
                        <b class="col-md-12 col-5">Loại hồ sơ</b>
                        <p class="col-md-12 col-7 text-nowrap"><?= $data["profiles"][0]["type_profile"] ?></p>
                    </div>
                    <div class="row" style="display: block; overflow: hidden; max-height: 100px;">
                        <b class="col-md-12 col-5">Số lượng hồ sơ</b>
                        <p class="col-md-12 col-7 text-nowrap"><?= $data["profiles"][0]["quantity_profile"] ?></p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row">
                        <b class="col-md-12 col-5">Người tiếp nhận</b>
                        <p class="col-md-12 col-7 text-nowrap"><?= $data["profiles"][0]["reciever"] ?></p>
                    </div>
                    <div class="row">
                        <b class="col-md-12 col-5">Phương thức liên hệ</b>
                        <p class="col-md-12 col-7 text-nowrap"><?= $data["profiles"][0]["contact_method"] ?></p>
                    </div>
                </div>
            </div>

            <!-- Section: Timeline -->
            <h4 class="strong-heading">Trạng thái hồ sơ: <?= $data["profiles"][0]["type_profile"] ?> </h4>
            <section class="p-4 m-0 mb-4 bg-light bg-gradient border rounded shadow">
                <ul class="timeline">
                    <li class="timeline-item <?php if (!empty($data["profiles"][0]['created_at'])) echo 'active'; ?>">
                        <h5 class="fw-bold">Hồ sơ chờ Văn phòng Đảng ủy kiểm duyệt</h5>
                        <p class="text-muted mb-2 fw-bold">
                            <?= date("H:i:s d-m-Y", strtotime($data["profiles"][0]['created_at'])) ?></p>
                        <p class="text-muted mb-2 fw-bold"> Nội dung:</P>
                        <pre class="text-muted" style="font-size: 16px;"><?= $data["profiles"][0]['name_profile'] ?></pre>
                    </li>
                    <li class="timeline-item <?php if (!empty($data["profiles"][0]['date_1'])) echo 'active'; ?>">
                        <h5 class="fw-bold">Văn phòng Đảng ủy đã nhận hồ sơ</h5>
                        <p class="text-muted mb-2 fw-bold">
                            <?= date("H:i:s d-m-Y", strtotime($data["profiles"][0]['date_1'])) ?></p>
                    </li>
                    <li class="timeline-item <?php if (!empty($data["profiles"][0]['date_2'])) echo 'active'; ?>">
                        <h5 class="fw-bold">Văn phòng Đảng ủy đang xử lý hồ sơ</h5>
                        <p class="text-muted mb-2 fw-bold">
                            <?= date("H:i:s d-m-Y", strtotime($data["profiles"][0]['date_2'])) ?></p>
                    </li>

                    <li class="timeline-item <?php if (!empty($data["profiles"][0]['date_3']) && !empty($data["profiles"][0]['note'])) echo 'active'; ?>">
                        <h5 class="fw-bold">Văn phòng Đảng ủy yêu cầu chỉnh sửa và bổ sung hồ sơ</h5>
                        <p class="text-muted mb-2 fw-bold">
                            <?= date("H:i:s d-m-Y", strtotime($data["profiles"][0]['date_3'])) ?></p>
                        <?php if (!empty($data["profiles"][0]['note'])) : ?>
                            <pre class="text-muted" style="font-size: 16px;"><?= $data["profiles"][0]['note'] ?></pre>
                        <?php endif; ?>
                    </li>


                    <li class="timeline-item <?php if (!empty($data["profiles"][0]['date_4'])) echo 'active'; ?>">
                        <h5 class="fw-bold">Văn phòng Đảng ủy trả hồ sơ về</h5>
                        <p class="text-muted mb-2 fw-bold">
                            <?= date("H:i:s d-m-Y", strtotime($data["profiles"][0]['date_4'])) ?></p>
                    </li>

                    <li class="timeline-item <?php if (!empty($data["profiles"][0]['date_5'])) echo 'active'; ?>">
                        <h5 class="fw-bold">Đã nhận lại hồ sơ từ Văn phòng Đảng ủy</h5>
                        <p class="text-muted mb-2 fw-bold">
                            <?= date("H:i:s d-m-Y", strtotime($data["profiles"][0]['date_5'])) ?></p>
                        <?php if (!empty($data["profiles"][0]['note_return_profile'])) : ?>
                            <pre class="text-muted" style="font-size: 16px;"><?= $data["profiles"][0]['note_return_profile2'] ?></pre>
                        <?php endif; ?>
                    </li>

                    <li class="timeline-item <?php if (!empty($data["profiles"][0]['date_6'])) echo 'active'; ?>">
                        <h5 class="fw-bold">Hoàn tất hồ sơ
                            <?= (!empty($data["profiles"][0]['date_5'])) ? '' : 'và lưu tại Văn phòng Đảng ủy'; ?></h5>
                        <p class="text-muted mb-2 fw-bold">
                            <?= date("H:i:s d-m-Y", strtotime($data["profiles"][0]['date_6'])) ?></p>
                        <?php if (!empty($data["profiles"][0]['note_return_profile'])) : ?>
                            <pre class="text-muted" style="font-size: 16px;"><?= $data["profiles"][0]['note_return_profile'] ?></pre>
                        <?php endif; ?>
                    </li>

                </ul>
            </section>
            <!-- Section: Timeline -->
        <?php } ?>
    </div>

    <div class="col-lg-6">
        <div class="copyright">
            &copy; Copyright to <a href="https://dangbo.hcmute.edu.vn/" target="_blank">Văn phòng Đảng ủy</a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            currentStep('step4')
        })

        function currentStep(step) {
            let currentStep = parseInt(step.replace(/\D/g, ''));
            for (let i = 1; i <= currentStep; i++) {
                activeStep(i);
            }
        }

        function activeStep(step) {
            $(`#step${step}`).removeClass('active');
            $(`#step${step}`).addClass('active');
        }
    </script>
</body>

</html>