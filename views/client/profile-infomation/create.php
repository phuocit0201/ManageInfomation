<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐẢNG ỦY | THÔNG TIN HỒ SƠ</title>
    <link rel="stylesheet" href="<?= base ?>/public/build/css/client/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="public/asset/logo-hcmute.png" type="image/x-icon" />
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
                        <li class="list-inline-item"><a href="mailto:vanphong_danguy@hcmute.edu.vn">
                                <i class="icofont-support-faq mr-2"></i>vanphong_danguy@hcmute.edu.vn</a></li>
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

<body class="bg-white">
    <div class="container">
        <form action="<?= base ?>nhap-thong-tin-ho-so" method="POST">
            <fieldset>
                <div class="text-center">
                    <img style="width: 100%;" src="public/images/van-phong-dien-tu-nen-do-16.svg" alt="" srcset="">
                    <h3 class="my-5 text-primary fw-bolder" style="color: red;">THÔNG TIN CHI TIẾT HỒ SƠ ĐÃ NỘP VỀ VĂN
                        PHÒNG ĐẢNG ỦY</h3>
                </div>
                <div class="container position-relative mb-5">
                    <p class="fw-bold fs-5 d-inline m-0 px-4 position-absolute top-0 start-50 translate-middle bg-white text-capitalize"
                        style="white-space: nowrap; color: #EC1C24;">THÔNG TIN NGƯỜI NỘP</p>
                    <div class="row my-3 p-4 border border-2 border-dark-subtle rounded">
                        <div class="col-md-4 mb-4">
                            <label for="full_name" class="form-label" style="color: #EC1C24;">Họ và Tên<span
                                    style="color: #EC1C24;">
                                    *</span></label>
                            <input required name="data[full_name]" type="text" value="<?= getOldValue('full_name') ?>"
                                id="full_name" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="phone_number" class="form-label" style="color: #EC1C24;">Số điện thoại<span
                                    style="color: #EC1C24;">
                                    *</span></label>
                            <input required name="data[phone_number]" type="tel"
                                value="<?= getOldValue('phone_number') ?>" id="phone_number" class="form-control">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="mail" class="form-label" style="color: #EC1C24;">Email<span style="color: red;">
                                    *</span></label>
                            <input required name="data[email]" type="email" value="<?= getOldValue('email') ?>"
                                id="email" class="form-control">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="organization" class="form-label" style="color: #EC1C24;">Đơn vị<span
                                    style="color: red;">
                                    *</span></label>
                            <select required name="data[organization]" id="organization" class="form-select"
                                value="<?= getOldValue('organization') ?>">
                                <option value="">Chọn Đơn vị</option>
                                <?php foreach ($data['organization'] as $item) { ?>
                                <option><?= $item['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="branch" class="form-label" style="color: #EC1C24;">Chi bộ<span
                                    style="color: red;"> *</span></label>
                            <select required name="data[branch]" id="branch" class="form-select"
                                value="<?= getOldValue('branch') ?>">
                                <option value="">Chọn Chi bộ</option>
                                <?php foreach ($data['branch'] as $item) { ?>
                                <option><?= $item['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="container position-relative mb-5">
                    <p class="fw-bold fs-5 d-inline m-0 px-4 position-absolute top-0 start-50 translate-middle bg-white text-capitalize"
                        style="white-space: nowrap; color: #EC1C24; left: 50%; transform: translateX(-50%);">CHI TIẾT VỀ
                        HỒ SƠ</p>
                    <div class="row my-3 p-4 border border-2 border-dark-subtle rounded">
                        <div class="col-md-6 mb-3">
                            <label for="type_profile" class="form-label" style="color: #EC1C24;">Chọn loại hồ sơ<span
                                    style="color: red;">
                                    *</span></label>
                            <select required name="data[type_profile]" id="type_profile" class="form-select">
                                <option value="">Chọn loại hồ sơ</option>
                                <?php foreach ($data['type-profile'] as $item) { ?>
                                <option><?= $item['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="quantity_profile" class="form-label" style="color: #EC1C24;">Số lượng hồ sơ<span
                                    style="color: red;">
                                    *</span></label>
                            <input required min="1" name="data[quantity_profile]" type="number"
                                value="<?= getOldValue('quantity_profile') ?>" id="quantity_profile"
                                class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="name_profile" class="form-label" style="color: #EC1C24;">Chi tiết hồ sơ<span
                                    style="color: red;">
                                    *</span></label>
                            <textarea cols="30" rows="10" required name="data[name_profile]" type="text"
                                value="<?= getOldValue('name_profile') ?>" id="name_profile"
                                class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="container position-relative mb-5">
                    <p class="fw-bold fs-5 d-inline m-0 px-4 position-absolute top-0 start-50 translate-middle bg-white text-capitalize"
                        style="white-space: nowrap; color: #EC1C24; left: 50%; transform: translateX(-50%);">THÔNG TIN
                        NGƯỜI TIẾP NHẬN</p>

                    <div class="row my-4 p-4 border border-2 border-dark-subtle rounded">
                        <div class="col-md-6 mb-3">
                            <label for="reciever" class="form-label" style="color: #EC1C24;">Người tiếp nhận<span
                                    style="color: red;">
                                    *</span></label>
                            <select required name="data[reciever]" id="reciever" class="form-select">
                                <option value="">Chọn người tiếp nhận</option>
                                <?php foreach ($data['receive-person'] as $item) { ?>
                                <option><?= $item['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contact_method" class="form-label" style="color: #EC1C24;">Phương thức liên
                                hệ<span style="color: red;">
                                    *</span></label>
                            <select required name="data[contact_method]" id="contact_method" class="form-select">
                                <option value="">Chọn phương thức liên hệ</option>
                                <?php foreach ($data['contact-method'] as $item) { ?>
                                <option><?= $item['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-center m-3">
                    <button type="submit" class="btn btn-primary">NỘP HỒ SƠ</button>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="col-lg-6">
        <div class="copyright">
            &copy; Copyright to <a href="https://dangbo.hcmute.edu.vn/" target="_blank">Văn phòng Đảng ủy</a>
        </div>
    </div>

    <div style="visibility: hidden;">
        <?php
        if (isset($_SESSION['notification'])) { ?>
        <span id="message"><?= $_SESSION['notification']['message'] ?></span>
        <span id="type-mess"><?= $_SESSION['notification']['type'] ?></span>
        <?php
            unset($_SESSION['notification']);
        } ?>
        <span></span>
    </div>
    <script>
    $(document).ready(function() {
        let message = $('#message').text();
        let typeMess = $('#type-mess').text();
        if (message.length > 0) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: typeMess,
                title: message
            })
        }
    });
    </script>
</body>

</html>