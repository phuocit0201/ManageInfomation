<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form action="<?=route('admin.change_password')?>" method="post" class="col-12">
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mật Khẩu Cũ</label>
                        <input type="password" value="<?=getOldValue('current_password')?>" name="current_password" class="form-control" id="exampleInputEmail1" placeholder="Nhập mật khẩu cũ" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Mật Khẩu Mới</label>
                        <input type="password" value="<?=getOldValue('new_password')?>" name="new_password" class="form-control" id="exampleInputEmail2" placeholder="Nhập mật khẩu mới" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Xác Nhận Mật Khẩu Mới</label>
                        <input type="password" value="<?=getOldValue('confirm_password')?>" name="confirm_password" class="form-control" id="exampleInputEmail3" placeholder="Xác nhận mật khẩu cũ" required>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary">Xác Nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>