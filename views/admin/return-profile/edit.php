<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form action="<?= route('admin.return-profile_edit') ?>" method="post" class="col-12">
                <div>
                    <div class="form-group">
                        <label>Mã hồ sơ</label>
                        <input type="text" value="<?=$data['returnProfile']['id']?>" name="data[id]"
                            class="form-control" readonly="readonly">
                    </div>

                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" value="<?=$data['returnProfile']['name']?>" name="data[name]"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Số điện thoại</label>
                            <input type="tel" value="<?=$data['returnProfile']['phone']?>" name="data[phone]"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="<?=$data['returnProfile']['email']?>" name="data[email]"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Chi Bộ</label>
                        <select name="data[id_branches]" class="form-control">
                            <?php foreach ($data['branches'] as $branch) { ?>
                            <?php if ($data['returnProfile']['id_branches'] == $branch['id']){ ?>
                            <option selected value="<?= $branch['id'] ?>"><?=$branch['name'] ?></option>
                            <?php } else {?>
                            <option value="<?=$branch['id'] ?>"><?=$branch['name'] ?></option>
                            <?php }}?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Đơn vị</label>
                        <select name="data[id_organization]" class="form-control">
                            <?php foreach ($data['organizations'] as $organization) { ?>
                            <?php if ($data['returnProfile']['id_organization'] == $organization['id']){ ?>
                            <option selected value="<?= $organization['id'] ?>"><?=$organization['name'] ?></option>
                            <?php } else {?>
                            <option value="<?=$organization['id'] ?>"><?=$organization['name'] ?></option>
                            <?php }}?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Hồ Sơ Cần Trả</label>
                        <select name="data[id_cetificate]" class="form-control">
                            <?php foreach ($data['certificates'] as $certificates) { ?>
                            <?php if ($data['returnProfile']['id_cetificate'] == $certificates['id']){ ?>
                            <option selected value="<?= $certificates['id'] ?>"><?=$certificates['name'] ?></option>
                            <?php } else {?>
                            <option value="<?=$certificates['id'] ?>"><?=$certificates['name'] ?></option>
                            <?php }}?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Chi tiết thông tin hồ sơ trả về </label>
                        <textarea id="" cols="20" rows="7" name="data[note]" class="form-control"><?= $data['returnProfile']['note'] ?></textarea>
                    </div>

                   <div class="form-group">
                            <label style="color: red;">Ghi chú khi đã nhận hồ sơ</label>
                            <textarea id="" cols="20" rows="7" name="data[note2]" class="form-control"><?= $data['returnProfile']['note2'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="data[received_at]" class="form-control">
                            <?php if ($data['returnProfile']['received_at'] != null){ ?>
                                <option value="1" selected>Đã nhận hồ sơ</option>
                                <option value="0">Chờ nhận</option>
                            <?php } else {?>
                                <option value="1">Đã nhận hồ sơ</option>
                                <option value="0" selected>Chờ nhận</option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="text-center" style="padding: 10px;">
                        <a href="<?= route('admin.return-profile') ?>" class="btn btn-primary">
                            Quay lại danh sách
                        </a>
                        <button class="btn btn-primary" type="submit" style="margin-left: 30px;">
                            Cập nhật trạng thái
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>