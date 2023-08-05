<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form action="<?= route('admin.profile_infomation_update') ?>" method="post" class="col-12">
                <div>
                    <div class="form-group">
                        <label>Mã Hồ Sơ</label>
                        <input type="text" disabled value="<?= $data['profile_infomation']['id'] ?>" class="form-control">
                        <input type="text" hidden value="<?= $data['profile_infomation']['id'] ?>" name="data[id]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Họ Và Tên</label>
                        <input type="text" value="<?= $data['profile_infomation']['full_name'] ?>" name="data[full_name]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input type="text" value="<?= $data['profile_infomation']['phone_number'] ?>" name="data[phone_number]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" value="<?= $data['profile_infomation']['email'] ?>" name="data[email]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tên Hồ Sơ</label>
                        <input type="text" value="<?= $data['profile_infomation']['name_profile'] ?>" name="data[name_profile]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Số Lượng Hồ Sơ</label>
                        <input type="text" value="<?= $data['profile_infomation']['quantity_profile'] ?>" name="data[quantity_profile]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Đơn Vị</label>
                        <select required name="data[organization]" id="organization" class="form-control" value="<?= getOldValue('organization') ?>">
                            <?php foreach ($data['organization'] as $item) { ?>
                                <?php if ($data['profile_infomation']['organization'] == $item['name']){ ?>
                                    <option selected value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                                <?php } else{?>
                                    <option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chi Bộ</label>
                        <select required name="data[branch]" id="branch" class="form-control" value="<?= getOldValue('branch') ?>">
                            <?php foreach ($data['branch'] as $item) { ?>
                                <?php if ($data['profile_infomation']['branch'] == $item['name']){ ?>
                                    <option selected value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                                <?php } else{?>
                                    <option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Hồ Sơ</label>
                        <select required name="data[type_profile]" id="type_profile" class="form-control">
                            <?php foreach ($data['type-profile'] as $item) { ?>
                                <?php if ($data['profile_infomation']['type_profile'] == $item['name']){ ?>
                                    <option selected value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                                <?php } else{?>
                                    <option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                            <?php }} ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Người Tiếp Nhận</label>
                        <select required name="data[reciever]" id="reciever" class="form-control">
                            <?php foreach ($data['receive-person'] as $item) { ?>
                                <?php if ($data['profile_infomation']['reciever'] == $item['name']){ ?>
                                    <option selected value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                                <?php } else{?>
                                    <option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phương Thức Liên Hệ</label>
                        <select required name="data[contact_method]" id="contact_method" class="form-control">
                            <?php foreach ($data['contact-method'] as $item) { ?>
                                <?php if ($data['profile_infomation']['contact_method'] == $item['name']){ ?>
                                    <option selected value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                                <?php } else{?>
                                    <option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <select required name="data[status]" id="contact_method" class="form-control">
                            <?php foreach (STATUS_PROFILE_INFO as $item) { ?>
                                <?php if ($data['profile_infomation']['status'] == $item['value']){ ?>
                                    <option selected value="<?= $item['value'] ?>"><?= $item['text'] ?></option>
                                <?php } else{?>
                                    <option value="<?= $item['value'] ?>"><?= $item['text'] ?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="form-group">
                            <label>Nội dung bổ sung hồ sơ</label>
                            <textarea id="" cols="30" rows="10" name="data[note]" class="form-control"><?= $data['profile_infomation']['note'] ?></textarea>
                        </div>
                    <div class="form-group">
                        <label>Thời Gian Nộp</label>
                        <input type="text" disabled value="<?= $data['profile_infomation']['created_at'] ?>" class="form-control">
                    </div>
                    <div class="text-center" style="padding: 10px;">
                        <a href="<?= route('admin.profile_infomation_show') . '?id=' . $data['profile_infomation']['id'] ?>" class="btn btn-primary" style="margin-right: 30px;">
                            Quay lại chi tiết
                        </a>
                        <a href="<?= route('admin.profile_infomation') ?>" class="btn btn-primary">
                            Quay lại danh sách
                        </a>
                        <button class="btn btn-primary" type="submit" style="margin-left: 30px;">
                            Cập nhật
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>