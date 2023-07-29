<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" href="<?= base ?>/public/build/css/client/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
</head>

<body>
    <div class="container">
        <form action="<?= base ?>tra-cuu-thong-tin" method="GET">
            <fieldset>
                <div class="text-center">
                    <img class="w-25 img-fluid" src=" <?= base ?>/public/images/job.svg" alt="" srcset="">
                    <h2 class="m-3 text-primary">TRA CỨU HỒ SƠ</h2>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Mã hồ sơ</span>
                    <input type="text" name="search" class="form-control" value="<?= $data["keyword"] ?? '' ?>" required>
                    <button type="submit" class="input-group-text btn-primary">Tra cứu</button>
                </div>
            </fieldset>
        </form>
    </div>
    <?php
    if (isset($data["profile"]) && empty($data["profile"]) && isset($data["keyword"])) { ?>
        <div class="container">
            <h2 class="text-danger text-center">KHÔNG TÌM THẤY HỒ SƠ</h2>
        </div>
    <?php
    } else if (isset($data["profile"]) && !empty($data["profile"]) && isset($data["keyword"])) {
    ?>
        <div class="container">
            <section class="multi_step_form">
                <form id="msform">
                    <!-- <div class="tittle">
                        <h2>Verification Process</h2>
                        <p>In order to use this service, you have to complete this verification process</p>
                    </div> -->
                    <ul id="progressbar">
                        <li id="step1">Chờ kiểm duyệt</li>
                        <li id="step2">Đã nhận hồ sơ </li>
                        <li id="step3">Đang xử lý </li>
                        <!-- <li id="step4">Thành công</li> -->
                    </ul>
                    <ul id="progressbar">
                        <li id="step4">Trả hồ sơ về </li>
                        <li id="step5">Chỉnh sửa và Bổ sung hồ sơ</li>
                        <li id="step6">Đã nhận lại Hồ sơ từ VPĐU</li>
                        <!-- <li id="step4">Thành công</li> -->
                    </ul>
                </form>
            </section>
            <table class="table mt-3">
                <tbody>
                    <tr>
                        <th scope="row" class="w-25">Họ và tên</th>
                        <td class="w-75"><?= $data["profile"]["full_name"] ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="w-25">Số điện thoại</th>
                        <td class="w-75"><?= $data["profile"]["phone_number"] ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="w-25">Email</th>
                        <td class="w-75"><?= $data["profile"]["email"] ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="w-25">Đơn vị</th>
                        <td class="w-75"><?= $data["profile"]["organization"] ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="w-25">Chi bộ</th>
                        <td class="w-75"><?= $data["profile"]["branch"] ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="w-25">Loại hồ sơ</th>
                        <td class="w-75"><?= $data["profile"]["type_profile"] ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="w-25">Số lượng hồ sơ</th>
                        <td class="w-75"><?= $data["profile"]["quantity_profile"] ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="w-25">Người tiếp nhận</th>
                        <td class="w-75"><?= $data["profile"]["reciever"] ?></td>
                    </tr>
                    <tr>
                        <th scope="row" class="w-25">Phương thức liên hệ</th>
                        <td class="w-75"><?= $data["profile"]["contact_method"] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>

    <script>
        $(document).ready(function (){
            currentStep('step4')
        })

        function currentStep(step)
        {
            let currentStep = parseInt(step.replace(/\D/g, ''));
            for (let i = 1; i <= currentStep; i++) {
                activeStep(i);
            }
        }

        function activeStep(step)
        {
            $(`#step${step}`).removeClass('active');
            $(`#step${step}`).addClass('active');
        }
    </script>
</body>

</html>