<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-success" href="<?= route('admin.invoice-create') ?>">
                            <i class="fas fa-plus"></i> Thêm phiếu thu
                        </a>
                    </div>

                    <div class="card-body">
                        <table id="table-data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Người nộp</th>
                                    <th>Chi bộ</th>
                                    <th>Nội dung</th>
                                    <th>Số tiền</th>
                                    <th>Hình thức</th>
                                    <th>Thời gian nộp </th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-data">
                                <?php foreach ($data['list'] as $key => $item) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><?= $item['branch_name'] ?></td>
                                        <td><?= $item['name_invoice'] ?></td>
                                        <td><?= $item['slave_money'] ?></td>
                                        <td>
                                            <?php
                                            $paymentValue = $item['payment'];

                                            $isChuyenKhoan = ($paymentValue == 'Chuyển khoản');
                                            $istienmat = ($paymentValue == 'Tiền mặt');

                                            // Kiểm tra và thêm class tương ứng
                                            if ($isChuyenKhoan) {
                                                echo '<span class="badge badge-success">' . $paymentValue . '</span>';
                                            } elseif ($istienmat) {
                                                echo '<span class="badge badge-danger">' . $paymentValue . '</span>';
                                            } else {
                                                echo $paymentValue;
                                            }
                                            ?>
                                        </td>
                                        <td> Ngày <?= date("d/m/Y", strtotime($item['created_at'])) ?></td>

                                        <td>
                                            <form action="<?= route('admin.invoice_delete') ?>" method="post" id="delete-item-form">
                                                <a href="<?= route('admin.invoice_show') . '?id=' . $item['id'] ?>" class="btn btn-info"> <i class="fas fa-info-circle"></i></a>
                                                <a href="<?= route('admin.invoice_edit') . '?id=' . $item['id'] ?>" class="btn btn-info"> <i class="fas fa-edit"></i> </a>
                                                <input type="text" name="id" hidden value="<?= $item['id'] ?>">
                                                <button class="btn btn-danger" type="button" id="delete-item-btn"> <i class="fas fa-trash"></i> </button>
                                                <a href="<?= route('admin.invoice_print') . '?id=' . $item['id'] ?>" class="btn btn-success"> <i class="fas fa-print"></i> </a>
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

    $(document).ready(function() {
        var table = $('#table-data').DataTable();

        // Thêm tất cả các giá trị từ cột "Họ Và Tên" vào danh sách lọc
        table.column(4).data().unique().sort().each(function(value, index) {
            $('#filter-select1').append('<option value="' + value + '">' + value + '</option>');
        });

        // Lắng nghe sự kiện thay đổi lựa chọn từ nút lọc
        $('#filter-select1').on('change', function() {
            var selectedValue = $(this).val();
            table.column(4).search(selectedValue).draw();
        });
    });
</script>