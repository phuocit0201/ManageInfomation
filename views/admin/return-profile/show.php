<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form action="<?= route('admin.return-profile-show') ?>" method="post" class="col-12">
                <div>

                    <div class="form-group">
                        <label>Mã Hồ Sơ</label>
                        <input type="text" disabled value="<?= $data['returnProfile']['id'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" disabled value="<?=$data['returnProfile']['name']?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="tel" disabled value="<?=$data['returnProfile']['phone']?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" disabled value="<?=$data['returnProfile']['email']?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Đơn vị</label>
                        <input type="text" disabled disabled value="<?= $data['returnProfile']['name_organization'] ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Chi bộ</label>
                        <input type="text" disabled disabled value="<?= $data['returnProfile']['name_branch'] ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Loại hồ sơ trả về</label>
                        <input type="text" disabled disabled value="<?= $data['returnProfile']['name_certificate'] ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Chi tiết Thông tin hồ sơ trả về</label>
                        <textarea cols="15" rows="5" type="text" disabled class="form-control"><?= $data['returnProfile']['note'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label" style="color: red;"> Ghi chú khi đã nhận hồ sơ </label>
                        <textarea cols="15" rows="5" type="text" disabled class="form-control"><?= $data['returnProfile']['note2'] ?></textarea>
                    </div>


                    <div class="form-group">
                        <label>Thời gian yêu cầu nhận</label>
                        <input type="text" disabled
                            value="<?= date("H:i:s d-m-Y", strtotime($data['returnProfile']['created_at']))  ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Thời gian đã nhận hồ sơ</label>
                        <input type="text" disabled
                            value="<?php echo $data['returnProfile']['received_at'] !== null ? date("H:i:s d-m-Y", strtotime($data['returnProfile']['received_at'])) : 'Hồ sơ chưa được nhận'; ?>"
                            class="form-control">
                    </div>

                    <div class="text-center" style="padding: 10px;">
                        <a href="<?= route('admin.return-profile') ?>" class="btn btn-primary">
                            Quay lại danh sách
                        </a>
                        <a href="<?= route('admin.return-profile_edit') . "?id=" . $data['returnProfile']['id'] ?>"
                            class="btn btn-primary">Chỉnh Sửa</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>