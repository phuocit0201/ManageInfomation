<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-success" type="button" class="btn btn-primary" id="export-excel"
                            data-toggle="modal" data-target="#exampleModal3">
                            <i class="fas fa-file-excel"></i> Xuất Excel
                        </button>
                        <a class="btn btn-success" href="<?= route('enter_profile') ?>">
                            <i class="fas fa-plus"></i> Thêm mới hồ sơ nhận
                        </a>

                        <a class="btn btn-success" href="<?= route('search_profile') ?>">
                            <i class="fas fa-plus"></i> Tra cứu hồ sơ
                        </a>
                    </div>
                    <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="btn btn-info">Phân loại theo hồ sơ:</label>
                            <select  class="form-select" aria-label="Default select example" id="filter-select1">
                                <option  value="">Tất cả</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table-data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã HS</th>
                                    <th>Họ Và Tên</th>
                                    <th>Chi bộ</th>
                                    <th>Loại Hồ Sơ</th>
                                    <th>Nội dung</th>
                                    <th>Thời Gian</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-data">
                                <?php foreach ($data['list'] as $key => $item) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $item['id'] ?></td>
                                    <td><?= $item['full_name'] ?></td>
                                    <td><?= $item['branch'] ?></td>
                                    <td><?= $item['type_profile'] ?></td>
                                    <td><?= $item['name_profile'] ?>
                                    <?php
                                            if ($item['status'] == STATUS_PROFILE_INFO[0]['value']) { ?>
                                        <span class="badge badge-danger"><?= STATUS_PROFILE_INFO[0]['text'] ?></span>
                                        <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[1]['value']) { ?>
                                        <span class="badge badge-warning"><?= STATUS_PROFILE_INFO[1]['text'] ?></span>
                                        <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[2]['value']) { ?>
                                        <span class="badge badge-info"><?= STATUS_PROFILE_INFO[2]['text'] ?></span>
                                        <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[3]['value']) { ?>
                                        <span class="badge badge-danger"><?= STATUS_PROFILE_INFO[3]['text'] ?></span>
                                        <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[4]['value']) { ?>
                                        <span class="badge badge-dark"><?= STATUS_PROFILE_INFO[4]['text'] ?></span>
                                        <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[5]['value']) { ?>
                                        <span class="badge badge-light"><?= STATUS_PROFILE_INFO[5]['text'] ?></span>
                                        <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[6]['value']) { ?>
                                        <span class="badge badge-success"><?= STATUS_PROFILE_INFO[6]['text'] ?></span>
                                        <?php } ?>
                    
                                </td>
                                    <td><?= date("H:i:s d-m-Y", strtotime($item['created_at'])) ?></td>

                                    <td>
                                        <form action="<?= route('admin.profile_infomation_delete') ?>" method="post"
                                            id="delete-item-form">
                                            <a href="<?= route('admin.profile_infomation_show') . '?id=' . $item['id'] ?>"
                                                class="btn btn-info">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="<?= route('admin.profile_infomation_edit') . '?id=' . $item['id'] ?>"
                                                class="btn btn-info">
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên người tiếp nhận"
                            required>
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
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                        <input type="text" min="1" value="1" name="offset" class="form-control"
                            placeholder="Nhập tên người tiếp nhận" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Nhập số lượng hồ sơ cần xuất tối đa 1000 hồ sơ</label>
                        <input type="number" min="1" value="1000" max="1000" name="limit" class="form-control"
                            placeholder="Nhập tên người tiếp nhận" required>
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

$(document).ready(function() {
    var table = $('#table-data').DataTable();

    // Thêm tất cả các giá trị từ cột "Họ Và Tên" vào danh sách lọc
    table.column(4).data().unique().sort().each(function (value, index) {
        $('#filter-select1').append('<option value="'+value+'">'+value+'</option>');
    });

    // Lắng nghe sự kiện thay đổi lựa chọn từ nút lọc
    $('#filter-select1').on('change', function() {
        var selectedValue = $(this).val();
        table.column(4).search(selectedValue).draw();
    });
});


</script>