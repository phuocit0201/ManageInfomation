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
        <form action="<?= base ?>nhap-thong-tin-ho-so" method="POST">
            <fieldset>
                <div class="text-center">
                    <img class="w-25 img-fluid" src=" <?= base ?>/public/images/job.svg" alt="" srcset="">
                    <h2 class="m-3 text-primary">NHẬP THÔNG TIN HỒ SƠ</h2>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="full_name" class="form-label">Họ và Tên</label>
                        <input required name="data[full_name]" type="text" value="<?=getOldValue('full_name')?>" id="full_name" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="phone_number" class="form-label">Số điện thoại</label>
                        <input required name="data[phone_number]" type="tel" value="<?=getOldValue('phone_number')?>" id="phone_number" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="mail" class="form-label">Email</label>
                        <input required name="data[email]" type="email" value="<?=getOldValue('email')?>" id="email" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="organization" class="form-label">Đơn vị</label>
                        <input required name="data[organization]" type="text" value="<?=getOldValue('organization')?>" id="organization" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="branch" class="form-label">Chi bộ</label>
                        <input required name="data[branch]" type="text" value="<?=getOldValue('branch')?>" id="branch" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="type_profile" class="form-label">Chọn loại hồ sơ</label>
                        <select required name="data[type_profile]" id="type_profile" class="form-select">
                            <option>Hồ sơ kết nạp Đảng</option>
                            <option>Hồ sơ công nhận Đảng viên chính thức</option>
                            <option>Hồ sơ Đảng viên đến</option>
                            <option>Hồ sơ đề nghị chuyển sinh hoạt Đảng</option>
                            <option>Lấy phiếu giới thiệu</option>
                            <option>Kế hoạnh và DTKP về nguồn</option>
                            <option value='other'>Khác</option>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3" id='js_name_profile'>
                        <label for="name_profile" class="form-label">Tên loại hồ sơ</label>
                        <input required name="data[type_profile]" type="text" value="<?=getOldValue('type_profile')?>" id="name_profile" class="form-control" disabled>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="quantity_profile" class="form-label">Số lượng hồ sơ</label>
                    <input required name="data[quantity_profile]" type="number" value="<?=getOldValue('quantity_profile')?>" id="quantity_profile" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="reciever" class="form-label">Người tiếp nhận</label>
                        <select required name="data[reciever]" id="reciever" class="form-select">
                            <option>Đ/c Phan Công Đức</option>
                            <option>Đ/c Nguyễn Thị Phương Nam</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="contact_method" class="form-label">Phương thức liên hệ</label>
                        <select required name="data[contact_method]" id="contact_method" class="form-select">
                            <option>Tiếp nhận trực tiếp</option>
                            <option>Liên hệ qua Zalo</option>
                            <option>Liên hệ qua Điện thoại</option>
                            <option>Liên hệ qua Email</option>
                        </select>
                    </div>
                </div>
                <div class="text-center m-3">
                    <button type="submit" class="btn btn-primary">Nộp hồ sơ</button>
                </div>
            </fieldset>
        </form>
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

            $('#type_profile').on('change', function() {
                var selectedValue = $(this).val();
                if (selectedValue == 'other') {
                    $('#name_profile').prop('disabled', false);
                } else {
                    $('#name_profile').prop('disabled', true);
                }
            });
        });
    </script>
</body>

</html>