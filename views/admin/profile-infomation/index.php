<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-success" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus"></i> Thêm Mới
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table-data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
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
                                <?php foreach ($data['list'] as $item) { ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['full_name'] ?></td>
                                        <td><?= $item['phone_number'] ?></td>
                                        <td><?= $item['type_profile'] ?></td>
                                        <td>
                                            <?php
                                            if ($item['status'] == STATUS_PROFILE_INFO[0]['value']) { ?>
                                                <span class="badge badge-warning"><?= STATUS_PROFILE_INFO[0]['text'] ?></span>
                                            <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[1]['value']) { ?>
                                                <span class="badge badge-success"><?= STATUS_PROFILE_INFO[1]['text'] ?></span>
                                            <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[2]['value']) { ?>
                                                <span class="badge badge-danger"><?= STATUS_PROFILE_INFO[2]['text'] ?></span>
                                            <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[3]['value']) { ?>
                                                <span class="badge badge-danger"><?= STATUS_PROFILE_INFO[3]['text'] ?></span>
                                            <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[4]['value']) { ?>
                                                <span class="badge badge-danger"><?= STATUS_PROFILE_INFO[4]['text'] ?></span>
                                            <?php } elseif ($item['status'] == STATUS_PROFILE_INFO[5]['value']) { ?>
                                                <span class="badge badge-danger"><?= STATUS_PROFILE_INFO[5]['text'] ?></span>
                                            <?php } ?>
                                            
                                        </td>
                                        <td><?= $item['created_at'] ?></td>
                                        <td>
                                            <form action="<?=route('admin.receive_persons_delete') ?>" method="post" id="delete-item-form">
                                                <button profile-type-id="<?=$item['id']?>" class="btn btn-info" 
                                                    data-toggle="modal" type="button" id="edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <input type="text" name="id" hidden value="<?= $item['id'] ?>">
                                                <button class="btn btn-danger" type="submit" id="delete-item-btn">
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
                <form action="<?=route('admin.receive_persons_store')?>" method="POST">
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
    });
    $(document).on('click', '#edit', function(){
        let id = $(this).attr('profile-type-id')
        $.ajax({
            type: 'GET',
            url: '<?=route('admin.receive_persons_show') . '?id='?>' + id
        }).done((res)=>{
            let data = JSON.parse(res);
            if (data.status) {
                let form = `
                <form action="<?=route('admin.receive_persons_update')?>" method="POST">
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