<?php $dataForm = $data ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form action="<?= route('admin.invoice-show') ?>" method="post" class="col-12">
                <div>

                    <div class="form-group">
                        <label for="branch" class="form-label" style="color: #014EC4;">Họ và tên người nộp tiền</label>
                        <input type="text" disabled value="<?= $data['invoice']['name'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="mail" class="form-label" style="color: #014EC4;">Email</label>
                        <input type="text" disabled value="<?= $data['invoice']['email'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="branch" class="form-label" style="color: #014EC4;">Đơn vị người nộp</label>
                        <input type="text" disabled value="<?= $data['invoice']['name_organization'] ?>"
                            class="form-control">

                    </div>

                    <div class="form-group">
                        <label for="branch" class="form-label" style="color: #014EC4;">Địa chỉ</label>
                        <input type="text" disabled value="<?= $data['invoice']['name_branch'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name_invoice" class="form-label" style="color: #014EC4;">Nội dung</label>
                        <input type="text" disabled value="<?= $data['invoice']['name_invoice'] ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="slave_money" class="form-label" style="color: #014EC4;">Số tiền</label>
                        <input type="text" disabled value="<?= $data['invoice']['slave_money'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="text_money" class="form-label" style="color: #014EC4;">Số tiền bằng chữ</label>
                        <input type="text" disabled value="<?= $data['invoice']['text_money'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="receive" class="form-label" style="color: #014EC4;">Người lập biểu</label>
                        <input type="text" disabled value="<?= $data['invoice']['name_receive_person'] ?>"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="payment" class="form-label" style="color: red;">Hình thức nộp Đảng phí</label>
                        <input type="text" disabled value="<?= $data['invoice']['payment'] ?>" class="form-control">
                    </div>

                    <div class="text-center" style="padding: #014EC4;">
                        <a href="<?= route('admin.invoice') ?>" class="btn btn-primary">
                            Quay lại bảng tổng hợp
                        </a>
                        <a href="<?=route('admin.invoice_print') . '?id=' . $data['invoice']['id']?>" class="btn btn-primary">
                            In lại phiếu thu
                        </a

                    </div>
                </div>
            </form>
        </div>
    </div>
</section>