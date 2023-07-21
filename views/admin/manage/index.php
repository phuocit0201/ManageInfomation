<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base . 'user/create' ?>" class="btn btn-success">
                            <i class="fas fa-plus"></i> Thêm Mới
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table-data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã HS</th>
                                    <th>Ngày Tạo</th>
                                    <th>Trạng Thái</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-data">
                                <?php foreach ($data['list'] as $item) { ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['created_at'] ?></td>
                                        <td>
                                            <?php
                                            if ($item['status'] == STATUS_MANAGE['wait']['value']) { ?>
                                                <span class="badge badge-warning"><?= STATUS_MANAGE['wait']['text'] ?></span>
                                            <?php } elseif ($item['status'] == STATUS_MANAGE['approve']['value']) { ?>
                                                <span class="badge badge-success"><?= STATUS_MANAGE['approve']['text'] ?></span>
                                            <?php } elseif ($item['status'] == STATUS_MANAGE['cancel']['value']) { ?>
                                                <span class="badge badge-danger"><?= STATUS_MANAGE['cancel']['text'] ?></span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <form action="<?= base . 'admin/manage/destroy' ?>" method="post" id="delete-item-form">
                                                <button type="button" file-id="<?= $item['id'] ?>" class="btn btn-info view-info-file">
                                                    <i class="fas fa-info-circle"></i>
                                                </button>
                                                <a href="<?= base . 'admin/manage/edit/' . $item['id'] ?>" class="btn btn-info">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <input type="text" name="id" hidden value="<?= $item['id'] ?>">
                                                <button class="btn btn-danger" type="button" id="delete-item-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        table = $('#table-data').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
                search: "Tìm kiếm",
                emptyTable: "Không có dữ liệu",
                paginate: {
                    first: "Trang đầu",
                    previous: "Trang trước",
                    next: "Trang sau",
                    last: "Trang cuối",
                },
                "info": "Bản ghi từ _START_ đến _END_ tổng cộng _TOTAL_ bản ghi",
                "infoFiltered": "",
            }
        });

        //Add buttons print pdf excel
        table.buttons().container().appendTo('#table-data_wrapper .col-md-6:eq(0)');
    })
</script>