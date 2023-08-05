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
    <div class="container w-100">
        <form action="<?= base ?>tra-cuu-thong-tin" method="GET">
            <fieldset>
                <div class="text-center">
                    <img style="width: 100%;" src="public/images/job.svg" alt="" srcset="">
                    <h3 class="my-5 text-primary fw-bolder">TRA CỨU THÔNG TIN HỒ SƠ</h3>
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
                            <td><a class="btn btn-primary" href="?search=<?= $profile['id'] ?>"><i class="far fa-eye"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php
        } else if (isset($data["profiles"]) && !empty($data["profiles"]) && isset($data["keyword"])) {
        ?>
            <h4 class="fw-bold">Thông tin hồ sơ</h4>
            <div class=" row p-4 m-0 mb-4 bg-light bg-gradient border rounded shadow">
                <div class="col-md-3">
                    <div class="row">
                        <b class="col-md-12 col-5">Họ và tên</b>
                        <p class="col-md-12 col-7 text-nowrap"><?= $data["profiles"][0]["full_name"] ?></p>
                    </div>
                    <div class="row">
                        <b class="col-md-12 col-5">Số điện thoại</b>
                        <p class="col-md-12 col-7 text-nowrap"><?= $data["profiles"][0]["phone_number"] ?></p>
                    </div>
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
                <div class="col-md-3">
                    <div class="row">
                        <b class="col-md-12 col-5">Loại hồ sơ</b>
                        <p class="col-md-12 col-7 text-nowrap"><?= $data["profiles"][0]["type_profile"] ?></p>
                    </div>
                    <div class="row">
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
            <h4 class="fw-bold">Trạng thái hồ sơ</h4>
            <section class="p-4 m-0 mb-4 bg-light bg-gradient border rounded shadow">
                <ul class="timeline">
                    <li class="timeline-item <?php if (!empty($data["profiles"][0]['created_at'])) echo 'active'; ?>">
                        <h5 class="fw-bold">Chờ kiểm duyệt</h5>
                        <p class="text-muted mb-2 fw-bold"><?= date("H:i:s d-m-Y", strtotime($data["profiles"][0]['created_at'])) ?></p>
                    </li>
                    <li class="timeline-item <?php if (!empty($data["profiles"][0]['date_1'])) echo 'active'; ?>">
                        <h5 class="fw-bold">Đã nhận hồ sơ</h5>
                        <p class="text-muted mb-2 fw-bold"><?= date("H:i:s d-m-Y", strtotime($data["profiles"][0]['date_1'])) ?></p>
                    </li>
                    <li class="timeline-item <?php if (!empty($data["profiles"][0]['date_2'])) echo 'active'; ?>">
                        <h5 class="fw-bold">Đang xử lý</h5>
                        <p class="text-muted mb-2 fw-bold"><?= date("H:i:s d-m-Y", strtotime($data["profiles"][0]['date_2'])) ?></p>
                    </li>
                    <li class="timeline-item <?php if (!empty($data["profiles"][0]['date_3'])) echo 'active'; ?>">
                        <h5 class="fw-bold">Trả hồ sơ về</h5>
                        <p class="text-muted mb-2 fw-bold"><?= date("H:i:s d-m-Y", strtotime($data["profiles"][0]['date_3'])) ?></p>
                    </li>
                    <li class="timeline-item <?php if (!empty($data["profiles"][0]['date_4'])) echo 'active'; ?>">
                        <h5 class="fw-bold">Chỉnh sửa và bổ sung</h5>
                        <p class="text-muted mb-2 fw-bold"><?= date("H:i:s d-m-Y", strtotime($data["profiles"][0]['date_4'])) ?></p>
                        <pre class="text-muted" style="font-size: 16px;"><?= $data["profiles"][0]['note'] ?></pre>
                    </li>
                    <li class="timeline-item <?php if (!empty($data["profiles"][0]['date_5'])) echo 'active'; ?>">
                        <h5 class="fw-bold">Đã nhận lại hồ sơ từ VPDU</h5>
                        <p class="text-muted mb-2 fw-bold"><?= date("H:i:s d-m-Y", strtotime($data["profiles"][0]['date_5'])) ?></p>
                    </li>
                    <li class="timeline-item <?php if (!empty($data["profiles"][0]['date_6'])) echo 'active'; ?>">
                        <h5 class="fw-bold">Hoàn tất hồ sơ <?php (!empty($data["profiles"][0]['date_5'])) ? '' : 'và lưu tại văn phòng'; ?></h5>
                        <p class="text-muted mb-2 fw-bold"><?= date("H:i:s d-m-Y", strtotime($data["profiles"][0]['date_6'])) ?></p>
                    </li>
                </ul>
            </section>
            <!-- Section: Timeline -->
        <?php } ?>
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