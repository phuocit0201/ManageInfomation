<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?=$data['statistical'][STATUS_PROFILE_INFO[0]['value']] ?? 0?></h3>
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
                        <h3><?=$data['statistical'][STATUS_PROFILE_INFO[1]['value']] ?? 0?></h3>
                        <p>Tổng hồ sơ đã nhận></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?=$data['statistical'][STATUS_PROFILE_INFO[2]['value']] ?? 0?></h3>
                        <p>Tổng hồ sơ đang xử lý</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?=$data['statistical'][STATUS_PROFILE_INFO[3]['value']] ?? 0?></h3>
                        <p>Tổng hồ sơ trả về</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?=$data['statistical'][STATUS_PROFILE_INFO[4]['value']] ?? 0?></h3>
                        <p>Tổng hồ sơ chỉnh sửa và bổ sung</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?=$data['statistical'][STATUS_PROFILE_INFO[5]['value']] ?? 0?></h3>
                        <p>Tổng hồ sơ đã nhận lại từ VPĐU</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>