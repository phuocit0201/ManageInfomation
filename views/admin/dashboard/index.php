<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $data['statistical'][STATUS_PROFILE_INFO[0]['value']] ?? 0 ?></h3>
                        <p>Tổng hồ sơ chờ kiểm duyệt</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $data['statistical'][STATUS_PROFILE_INFO[1]['value']] ?? 0 ?></h3>
                        <p>Tổng hồ sơ đã nhận</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $data['statistical'][STATUS_PROFILE_INFO[2]['value']] ?? 0 ?></h3>
                        <p>Tổng hồ sơ đang xử lý</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $data['statistical'][STATUS_PROFILE_INFO[3]['value']] ?? 0 ?></h3>
                        <p>Tổng hồ sơ chỉnh sửa và bổ sung</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $data['statistical'][STATUS_PROFILE_INFO[4]['value']] ?? 0 ?></h3>
                        <p>Tổng hồ sơ trả về</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $data['statistical'][STATUS_PROFILE_INFO[5]['value']] ?? 0 ?></h3>
                        <p>Tổng hồ sơ đã nhận lại từ VPĐU</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $data['statistical'][STATUS_PROFILE_INFO[6]['value']] ?? 0 ?></h3>
                        <p>Tổng hồ sơ hoàn tất và lưu lại VPĐU</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
               
            <div class="col-md-12">
                <!-- STACKED BAR CHART -->
                <form action="" method="get" class="input-group mb-3">
                    <select required name="month" id="contact_method" class="form-control">
                        <option>Vui lòng chọn tháng</option>
                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                            <?php if ($i == $data['month']) { ?>
                                <option selected value="<?= $i ?>"><?= $i ?></option>
                            <?php } else { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                        <?php }
                        } ?>
                    </select>
                    <input type="text" name="year" class="form-control" value="<?= $data['year'] ?>" placeholder="Nhập Năm" required>
                    <button type="submit" class="btn btn-primary" style="padding: 0px 50px;">Lọc Kết Quả</button>
                </form>
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Biểu Đồ Hồ Sơ Tháng <?= $data['month'] ?> năm <?= $data['year'] ?></h3>
                        <div id="data-statistics" days="<?= $data['days'] ?>" parameters="<?= $data['params'] ?>"></div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="stackedBarChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                        </div>
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
        //- BAR CHART -
        //-------------
        var days = JSON.parse($('#data-statistics').attr('days'));
        var params = JSON.parse($('#data-statistics').attr('parameters'));
        var areaChartData = {
            labels: days,
            datasets: [{
                label: 'Hồ sơ theo ngày',
                backgroundColor: 'rgba(255, 0, 0, 1)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: params
            }, ]
        }

        //---------------------
        //- STACKED BAR CHART -
        //---------------------
        var barChartData = $.extend(true, {}, areaChartData);
        var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d');
        var stackedBarChartData = $.extend(true, {}, barChartData);

        var stackedBarChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true,
                    ticks: {
                        beginAtZero: true, // Đảm bảo trục y bắt đầu từ 0
                        callback: function(value, index, values) {
                            if (Number.isInteger(value)) return value;
                        }
                    }
                }]
            }
        }

        new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
        });
    });
</script>