<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form action="<?= route('admin.change_password') ?>" method="post" class="col-12">
                <div class="col-12">
                    <div class="form-group">
                        <label>Mã Hồ Sơ</label>
                        <input type="text" disabled value="<?= $data['profile_infomation']['id'] ?>" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Họ Và Tên</label>
                        <input type="text" value="<?= $data['profile_infomation']['full_name'] ?>" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input type="text" value="<?= $data['profile_infomation']['phone_number'] ?>" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" value="<?= $data['profile_infomation']['email'] ?>" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Đơn Vị</label>
                        <input type="text" value="<?= $data['profile_infomation']['organization'] ?>" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Chi Bộ</label>
                        <input type="text" value="<?= $data['profile_infomation']['branch'] ?>" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Loại Hồ Sơ</label>
                        <input type="text" value="<?= $data['profile_infomation']['type_profile'] ?>" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tên Hồ Sơ</label>
                        <input type="text" value="<?= $data['profile_infomation']['name_profile'] ?>" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Số Lượng Hồ Sơ</label>
                        <input type="text" value="<?= $data['profile_infomation']['quantity_profile'] ?>" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Người Tiếp Nhận</label>
                        <input type="text" value="<?= $data['profile_infomation']['reciever'] ?>" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Phương Thức Liên Hệ</label>
                        <input type="text" value="<?= $data['profile_infomation']['contact_method'] ?>" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <input type="text" value="<?= $data['profile_infomation']['status'] ?>" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Thời Gian Nộp</label>
                        <input type="text" value="<?= $data['profile_infomation']['created_at'] ?>" name="current_password" class="form-control">
                    </div>
                    <div class="text-center" style="padding: 10px;">
                        <a href="<?= route('admin.profile_infomation_show') . '?id=' . $data['profile_infomation']['id'] ?>" class="btn btn-primary" style="margin-right: 30px;">
                            Quay lại chi tiết
                        </a>
                        <a href="<?= route('admin.profile_infomation') ?>" class="btn btn-primary">
                            Quay lại danh sách
                        </a>
                        <button class="btn btn-primary" type="submit" id="delete-item-btn" style="margin-left: 30px;">
                            Cập nhật
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>