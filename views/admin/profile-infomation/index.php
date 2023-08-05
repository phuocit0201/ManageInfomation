<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-success" type="button" class="btn btn-primary" id="export-excel" data-toggle="modal" data-target="#exampleModal3">
                            <i class="fas fa-file-excel"></i> Xuất Excel
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table-data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>STT</td>
                                    <th>Mã HS</th>
                                    <th>Họ Và Tên</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Loại Hồ Sơ</th>
                                    <th>Thời Gian</th>
                                    <th>Trạng Thái</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-data">
                                <?php foreach ($data['list'] as $key => $item) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['full_name'] ?></td>
                                        <td><?= $item['phone_number'] ?></td>
                                        <td><?= $item['type_profile'] ?></td>
                                        <td><?= $item['created_at'] ?></td>
                                        <td>
                                            <?php
                                            if ($item['status'] == STATUS_PROFILE_INFO[0]['value']) { ?>
                                                <span class="badge badge-warning"><?= STATUS_PROFILE_INFO[0]['text'] ?></span>
                                            <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[1]['value']) { ?>
                                                <span class="badge badge-success"><?= STATUS_PROFILE_INFO[1]['text'] ?></span>
                                            <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[2]['value']) { ?>
                                                <span class="badge badge-success"><?= STATUS_PROFILE_INFO[2]['text'] ?></span>
                                            <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[3]['value']) { ?>
                                                <span class="badge badge-success"><?= STATUS_PROFILE_INFO[3]['text'] ?></span>
                                            <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[4]['value']) { ?>
                                                <span class="badge badge-success"><?= STATUS_PROFILE_INFO[4]['text'] ?></span>
                                            <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[5]['value']) { ?>
                                                <span class="badge badge-success"><?= STATUS_PROFILE_INFO[5]['text'] ?></span>
                                            <?php } ?>

                                        </td>
                                        <td>
                                            <form action="<?= route('admin.profile_infomation_delete') ?>" method="post" id="delete-item-form">
                                                <a href="<?= route('admin.profile_infomation_show') . '?id=' . $item['id'] ?>" class="btn btn-info">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                                <a href="<?= route('admin.profile_infomation_edit') . '?id=' . $item['id'] ?>" class="btn btn-info">
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Mới Loại Hồ Sơ<i></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= route('admin.profile_infomation_store') ?>" method="POST">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Nhập Tên Người Tiếp Nhận</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên người tiếp nhận" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa người tiếp nhận<i></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="body-edit">

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xuất File Excel<i></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="form-excel">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Nhập số thứ tự bắt đầu xuất</label>
                        <input type="text" min="1" value="1" name="offset" class="form-control" placeholder="Nhập tên người tiếp nhận" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Nhập số lượng hồ sơ cần xuất tối đa 1000 hồ sơ</label>
                        <input type="number" min="1" value="1000" max="1000" name="limit" class="form-control" placeholder="Nhập tên người tiếp nhận" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Xuất File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('submit', '#form-excel', function(e) {
        e.preventDefault();
        $('#loading__js').css('display', 'flex');
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'http://localhost/ManageInfomation/admin/profile-infomations/export-excel',
            data: formData
        }).done(res => {
            let data = JSON.parse(res);
            if (data['status'] == true) {
                const a = document.createElement('a');
                a.style.display = 'none';
                a.href = data['url'];
                a.download = data['file_name'];
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(data['url']);
                document.body.removeChild(a);
            } else {
                alert(data['mess']);
            }
            $('#loading__js').css('display', 'none');
        });
    })
    $(document).ready(function() {
        var columnsExport = [];
        // Count columns export
        Array.from($('#table-data tr th')).forEach((child, index) => {
            columnsExport.push(index)
        });
        // Remove colomn action
        columnsExport.pop();
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
            },
            "buttons": [{
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: columnsExport
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: columnsExport
                    }

                },
            ],
        });

        //Add buttons print pdf excel
        // table.buttons().container().appendTo('#table-data_wrapper .col-md-6:eq(0)');
        // $('.buttons-print').html('<i class="fas fa-print"></i>');
        // $('.buttons-pdf').html('<i class="fas fa-file-pdf"></i>');
        // $('.buttons-excel').html('<i class="fas fa-file-excel"></i>');
        // //change background-color buttons
        // $('.dt-buttons button').css("background-color", "#28a745");
        // //set width input search
        // $('#table-crud_filter input').css('width', '250px');
    });
    $(document).on('click', '#edit', function() {
        let id = $(this).attr('profile-type-id')
        $.ajax({
            type: 'GET',
            url: '<?= route('admin.profile_infomation_show') . '?id=' ?>' + id
        }).done((res) => {
            let data = JSON.parse(res);
            if (data.status) {
                let form = `
                <form action="<?= route('admin.profile_infomation_update') ?>" method="POST">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Nhập Tên Người Tiếp Nhận</label>
                        <input type="text" name="name" value="${data.data.name}" class="form-control" placeholder="Nhập tên người tiếp nhận" required>
                        <input type="text" name="id" value="${data.data.id}" class="form-control" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
                `;
                $('#body-edit').html(form);
                $('#exampleModal1').modal('show');
            }
        });
    });
</script>