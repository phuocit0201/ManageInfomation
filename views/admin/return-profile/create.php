<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form action="<?= route('admin.return-profile-create') ?>" method="post" class="col-12">
                <div>

                    <div class="form-group">
                    <label for="full_name" class="form-label" style="color: #014EC4;" >Họ và Tên</label>
                        <input type="text" name="data[name]" class="form-control">
                    </div>

                    <div class="form-group">
                    <label for="phone_number" class="form-label" style="color: #014EC4;" >Số điện thoại</label>
                        <input type="tel" name="data[phone]" class="form-control">
                    </div>

                    <div class="form-group">
                    <label for="mail" class="form-label" style="color: #014EC4;" >Email</label>
                        <input type="email" name="data[email]" class="form-control">
                    </div>

                    <div class="form-group">
                    <label for="branch" class="form-label" style="color: #014EC4;" >Chi bộ</label>
                        <select name="data[id_branches]" class="form-control">
                        <option value="">Chọn Chi bộ</option>
                            <?php foreach ($data['branches'] as $branch) { ?>
                                <option value="<?=$branch['id']?>"><?=$branch['name']?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="branch" class="form-label" style="color: #014EC4;" >Đơn vị</label>
                        <select name="data[id_organization]" class="form-control">
                        <option value="">Chọn Đơn vị</option>
                            <?php foreach ($data['organizations'] as $organization) { ?>
                                <option value="<?=$organization['id']?>"><?=$organization['name']?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="branch" class="form-label" style="color: #014EC4;" >Loại hồ sơ trả về</label>
                        <select name="data[id_cetificate]" class="form-control">
                        <option value="">Chọn hồ sơ cần trả về</option>
                            <?php foreach ($data['certificates'] as $certificate) { ?>
                                <option value="<?=$certificate['id']?>"><?=$certificate['name']?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="branch" class="form-label" style="color: #014EC4;" >Nội dung đính kèm</label>
                            <textarea id="" cols="30" rows="10" name="data[note]" class="form-control"></textarea>
                    </div>

                    <div class="text-center" style="padding: 10px;">
                        <a href="<?= route('admin.return-profile') ?>" class="btn btn-primary">
                            Quay lại danh sách
                        </a>
                        <button class="btn btn-primary" type="submit" style="margin-left: 30px;">
                            Thêm hồ sơ trả
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>