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
            <table class="table">
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
                        <td class="w-75"><?= $data["profile"]["mail"] ?></td>
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
</body>

</html>