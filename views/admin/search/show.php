<?php
// Kiểm tra xem tham số 'data' có tồn tại không
if(isset($_GET['data'])) {
    // Hiển thị dữ liệu JSON để kiểm tra
   //  echo "Raw JSON Data: " . $_GET['data'] . "<br>";

    // Nhận dữ liệu từ URL và giải mã JSON
    $jsonData = json_decode($_GET['data'], true);

    // Kiểm tra xem giải mã JSON có thành công không
    if($jsonData !== null) {
        // Dữ liệu đã được giải mã và nằm trong biến $jsonData
        // Bạn có thể truy cập dữ liệu như sau:
        // $jsonData['key1'], $jsonData['key2'], ...

        // Ví dụ: in ra dữ liệu
      //   echo "Decoded JSON Data: ";
        
    } else {
        // Xử lý khi giải mã JSON không thành công
        echo "Failed to decode JSON data.";
    }
} else {
    // Xử lý khi tham số 'data' không tồn tại
    echo "No data parameter found in the URL.";
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="author" content="MatrrDigital">
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <meta name="robots" content="noindex, nofollow">
   <link rel="shortcut icon" href="public/dist/data/images/favicon.png" type="image/x-icon" />

   <!-- ================== BEGIN PAGE LEVEL CSS START ================== -->
   <link rel="stylesheet" href="public/dist/data/css/icons.css" />
   <link rel="stylesheet" href="public/dist/data/libs/wave-effect/css/waves.min.css" />
   <link rel="stylesheet" href="public/dist/data/libs/owl-carousel/css/owl.carousel.min.css" />
   <!-- ================== BEGIN PAGE LEVEL END ================== -->
   <!-- ================== Plugins CSS  ================== -->
   <link rel="stylesheet" href="public/dist/data/libs/flatpicker/css/flatpickr.min.css">
   <link href="public/dist/data/libs/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
   <link href="public/dist/data/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
   <!-- ================== Plugins CSS ================== -->
   <!-- ================== BEGIN APP CSS  ================== -->
   <link rel="stylesheet" href="public/dist/data/css/bootstrap.min.css" />
   <link rel="stylesheet" href="public/dist/data/css/styles.min.css" />
   <!-- ================== END APP CSS ================== -->
</head>
<style>
   .table-responsive table tbody tr td:nth-child(2) {
    color: #014EC4  !important;
    font-weight: bold;
}
</style>

<body>
   <!-- Begin Page -->
   <div class="page-wrapper">

      <!-- content -->
      <div class="page-content">
         <!-- page header -->
         <div class="page-title-box">
         </div>
         <!-- page content -->
         <div class="page-content-wrapper mt--45">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-4 col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <div class="media mb-9">
                              <img src="public/asset/Logo-dang.png" alt="Lettstart Admin" class="avatar-lg rounded-circle me-3" />
                              <div class="media-body">
                                 <h5 class="text-dark fw-semibold mt-2"><?= $jsonData["HỌ VÀ TÊN"] ?><i class='bx bxs-badge-check fs-sm align-middle text-success'></i></h5>
                                 <h6 class="text-muted fw-semibold mt-2 mb-3">Đảng viên chính thức</h6>
                                 <button type="button" class="btn btn-primary btn-sm me-1" id="msg-btn">Mail: <?= $jsonData["EMAIL"] ?></button>
                                 <button type="button" class="btn btn-success btn-sm">SĐT: <?= $jsonData["SỐ ĐIỆN THOẠI"] ?></button>
                                 <!-- <button type="button" class="btn btn-primary btn-sm">Zalo</button> -->
                              </div>
                           </div>
                           <div class="mt-4 pt-4 border-top">
                              <h5 class="mb-3 pt-2 fw-semibold text-dark">Sơ yếu lí lịch</h5>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                              <div class="table-responsive">
                                 <table class="table table-borderless text-muted mb-0 table-sm fs-18">
                                    <tbody>
                                       <tr>
                                          <th class="pl-0" scope="row">Chi bộ</th>
                                          <td><?= $jsonData["CHI BỘ"] ?></td>
                                       </tr>

                                       <tr>
                                          <th class="pl-0" scope="row">Đối tượng</th>
                                          <td><?= $jsonData["Đối tượng"] ?></td>
                                       </tr>

                                       <tr>
                                          <th class="pl-0" scope="row">Mã số</th>
                                          <td><?= $jsonData["MSCB/MSSV"] ?></td>
                                       </tr>

                                       <tr>
                                          <th class="pl-0" scope="row">SĐT</th>
                                          <td><?= $jsonData["SỐ ĐIỆN THOẠI"] ?></td>
                                       </tr>

                                       <tr>
                                          <th class="pl-0" scope="row">Email</th>
                                          <td><?= $jsonData["EMAIL"] ?></td>
                                       </tr>

                                       <tr>
                                          <th class="pl-0" scope="row">Quê Quán</th>
                                          <td><?= $jsonData["QUÊ QUÁN"] ?></td>
                                       </tr>
                                       <tr>
                                          <th class="pl-0" scope="row">Địa chỉ</th>
                                          <td><?= $jsonData["ĐỊA CHỈ Ở HIỆN TẠI"] ?></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              </div>
                              <div class="col-md-6">
                              <div class="table-responsive">
                                 <table class="table table-borderless text-muted mb-0 table-sm fs-18">
                                    <tbody>
                                       <tr>
                                          <th class="pl-0" scope="row">Dân tộc</th>
                                          <td><?= $jsonData["DÂN TỘC"] ?></td>
                                       </tr>

                                       <tr>
                                          <th class="pl-0" scope="row">Tôn giáo</th>
                                          <td><?= $jsonData["TÔN GIÁO"] ?></td>
                                       </tr>

                                       <tr>
                                          <th class="pl-0" scope="row">Giới tính</th>
                                          <td><?= $jsonData["GIỚI TÍNH"] ?></td>
                                       </tr>

                                       <tr>
                                          <th class="pl-0" scope="row" style="color: red;">Ngày kết nạp</th>
                                          <td><?= $jsonData["NGÀY KẾT NẠP"] ?></td>
                                       </tr>

                                       <tr>
                                          <th class="pl-0" scope="row" style="color: red;">Ngày chính thức</th>
                                          <td><?= $jsonData["NGÀY CHÍNH THỨC"] ?></td>
                                       </tr>

                                       <tr>
                                          <th class="pl-0" scope="row" style="color: red;">Số lí lịch</th>
                                          <td><?= $jsonData["SỐ LÝ LỊCH ĐẢNG VIÊN"] ?></td>
                                       </tr>

                                       <tr>
                                          <th class="pl-0" scope="row" style="color: red;">Số thẻ đảng</th>
                                          <td><?= $jsonData["SỐ THẺ ĐẢNG VIÊN"] ?></td>
                                       </tr>

                                    </tbody>
                                 </table>
                              </div>
                              </div>
                           </div>

                           <div class="row">

                              <div class="col-md-4">
                                 <div class="mt-6 pt-2 border-top">
                                    <h5 class="mb-3 pt-2 fw-semibold text-dark">Chức vụ Đảng - Đoàn thể</h5>
                                    <label class="badge badge-soft-primary"><?= $jsonData["CHỨC VỤ ĐẢNG - ĐOÀN THỂ"] ?></label>
                                 </div>
                              </div>

                              <div class="col-md-4">
                                 <div class="mt-6 pt-2 border-top">
                                    <h5 class="mb-3 pt-2 fw-semibold text-dark">Chức vụ chính quyền</h5>
                                    <label class="badge badge-soft-primary"><?= $jsonData["CHỨC VỤ CHÍNH QUYỀN"] ?></label>
                                 </div>
                              </div>

                              <!-- <div class="col-md-4">
                                 <div class="mt-6 pt-2 border-top">
                                    <h5 class="mb-3 pt-2 fw-semibold text-dark">Chức vụ khác</h5>
                                    <label class="badge badge-soft-primary"><?= $jsonData["CHỨC VỤ KHÁC"] ?></label>
                                 </div>
                              </div> -->
                              
                           </div>

                        </div>
                     </div>
                     <!-- end card -->
                  </div>
                  <div class="col-lg-4 col-xl-4">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="mb-4 fw-semibold text-dark">Lịch sử bản thân</h5>
                           <div class="">
                              <ul class="list-unstyled activity-widget mb-0">
                                 <li class="activity-list">
                                    <div class="media">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-server fs-sm bx-flashing"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">Back end
                                                Developer</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2016 - 20</p>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="activity-list">
                                    <div class="media">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-code fs-sm"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">Front end
                                                Developer</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2013 - 16</p>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="activity-list">
                                    <div class="media pb-0">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-photo-album fs-sm"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">UI & UX
                                                Specialist</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2010 - 2015</p>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-xl-4">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="mb-4 fw-semibold text-dark">Những công tác và chức vụ đã qua</h5>
                           <div class="">
                              <ul class="list-unstyled activity-widget mb-0">
                                 <li class="activity-list">
                                    <div class="media">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-server fs-sm bx-flashing"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">Back end
                                                Developer</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2016 - 20</p>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="activity-list">
                                    <div class="media">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-code fs-sm"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">Front end
                                                Developer</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2013 - 16</p>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="activity-list">
                                    <div class="media pb-0">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-photo-album fs-sm"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">UI & UX
                                                Specialist</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2010 - 2015</p>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-xl-4">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="mb-4 fw-semibold text-dark">Những lớp đào tạo, bồi dưỡng đã qua</h5>
                           <div class="">
                              <ul class="list-unstyled activity-widget mb-0">
                                 <li class="activity-list">
                                    <div class="media">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-server fs-sm bx-flashing"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">Back end
                                                Developer</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2016 - 20</p>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="activity-list">
                                    <div class="media">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-code fs-sm"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">Front end
                                                Developer</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2013 - 16</p>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="activity-list">
                                    <div class="media pb-0">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-photo-album fs-sm"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">UI & UX
                                                Specialist</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2010 - 2015</p>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-xl-4">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="mb-4 fw-semibold text-dark">Đi nước ngoài</h5>
                           <div class="">
                              <ul class="list-unstyled activity-widget mb-0">
                                 <li class="activity-list">
                                    <div class="media">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-server fs-sm bx-flashing"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">Back end
                                                Developer</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2016 - 20</p>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="activity-list">
                                    <div class="media">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-code fs-sm"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">Front end
                                                Developer</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2013 - 16</p>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="activity-list">
                                    <div class="media pb-0">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-photo-album fs-sm"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">UI & UX
                                                Specialist</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2010 - 2015</p>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-xl-4">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="mb-4 fw-semibold text-dark">Khen thưởng</h5>
                           <div class="">
                              <ul class="list-unstyled activity-widget mb-0">
                                 <li class="activity-list">
                                    <div class="media">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-server fs-sm bx-flashing"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">Back end
                                                Developer</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2016 - 20</p>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="activity-list">
                                    <div class="media">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-code fs-sm"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">Front end
                                                Developer</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2013 - 16</p>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="activity-list">
                                    <div class="media pb-0">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-photo-album fs-sm"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">UI & UX
                                                Specialist</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2010 - 2015</p>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-xl-4">
                     <div class="card">
                        <div class="card-body">
                           <h5 class="mb-4 fw-semibold text-dark">Kỷ luật</h5>
                           <div class="">
                              <ul class="list-unstyled activity-widget mb-0">
                                 <li class="activity-list">
                                    <div class="media">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-server fs-sm bx-flashing"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">Back end
                                                Developer</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2016 - 20</p>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="activity-list">
                                    <div class="media">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-code fs-sm"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">Front end
                                                Developer</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2013 - 16</p>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="activity-list">
                                    <div class="media pb-0">
                                       <div class="text-center me-3 bg-white">
                                          <div class="avatar-sm">
                                             <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <i class="bx bx-photo-album fs-sm"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="media-body overflow-hidden">
                                          <h6 class="fs-15 mb-1 fw-bold"><a href="#" class="text-default">UI & UX
                                                Specialist</a></h6>
                                          <p class="text-primary fs-13 text-truncate mb-0">2010 - 2015</p>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-8 col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <ul class="nav nav-pills bg-light nav-justified" id="pills-tab" role="tablist">
                              <li class="nav-item">
                                 <a class="nav-link active" id="pills-activity-tab" data-bs-toggle="pill" href="#pills-activity" role="tab" aria-controls="pills-activity" aria-selected="true">
                                    Quá trình kết nạp - chuyển chính thức
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="pills-projects-tab" data-bs-toggle="pill" href="#pills-projects" role="tab" aria-controls="pills-projects" aria-selected="false">
                                    Hoàn cảnh gia đình
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="pills-tasks-tab" data-bs-toggle="pill" href="#pills-tasks" role="tab" aria-controls="pills-tasks" aria-selected="false">
                                    Chuyên đề hằng năm
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="pills-messages-tab" data-bs-toggle="pill" href="#pills-settings" role="tab" aria-controls="pills-settings" aria-selected="false">
                                    Cập nhật dữ liệu
                                 </a>
                              </li>
                           </ul>

                           <div class="tab-content mt-4 pt-3" id="pills-tabContent">
                              <div class="tab-pane fade show active" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                                 <div class="d-block d-lg-none mb-12">
                                    <div class="d-inline-flex me-2 input-date">
                                       <input class="form-control" type="text" id="inline-datepicker-m" placeholder="Choose Date">
                                       <div class="date-icon">
                                          <i class="bx bx-calendar fs-sm"></i>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-lg-6">
                                       <h5 class="fw-semibold text-dark mb-4">Kết nạp</h5>
                                       <div class="timeline-left-only ms-3">
                                          <div class="timeline-primary">
                                             <div class="timeline-item w-">
                                                <div class="timeline-box card w-100">
                                                   <div class="card-body">
                                                      <div class="timeline-icon bg-white fs-lg">
                                                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em">
                                                            <path class="quarter-fill" d="M12,14.19531a1.00211,1.00211,0,0,1-.5-.13379l-9-5.19726a1.00032,1.00032,0,0,1,0-1.73242l9-5.19336a1.00435,1.00435,0,0,1,1,0l9,5.19336a1.00032,1.00032,0,0,1,0,1.73242l-9,5.19726A1.00211,1.00211,0,0,1,12,14.19531Z">
                                                            </path>
                                                            <path class="half-fill" d="M21.5,11.13184,19.53589,9.99847,12.5,14.06152a1.0012,1.0012,0,0,1-1,0L4.46411,9.99847,2.5,11.13184a1.00032,1.00032,0,0,0,0,1.73242l9,5.19726a1.0012,1.0012,0,0,0,1,0l9-5.19726a1.00032,1.00032,0,0,0,0-1.73242Z">
                                                            </path>
                                                            <path class="full-fill" d="M21.5,15.13184l-1.96411-1.13337L12.5,18.06152a1.0012,1.0012,0,0,1-1,0L4.46411,13.99847,2.5,15.13184a1.00032,1.00032,0,0,0,0,1.73242l9,5.19726a1.0012,1.0012,0,0,0,1,0l9-5.19726a1.00032,1.00032,0,0,0,0-1.73242Z">
                                                            </path>
                                                         </svg>
                                                      </div>
                                                      <div class="d-inline-block py-1 px-3 bg-soft-primary text-primary fw-semibold badge-pill rounded-1">
                                                         2018 - 19
                                                      </div>
                                                      <h6 class="fs-15 fw-semibold mt-3">Appco Website</h6>
                                                      <div class="text-muted">
                                                         <p class="mb-0">Appco Website - A responsive web template</p>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="timeline-primary">
                                             <div class="timeline-item">
                                                <div class="timeline-box card w-100">
                                                   <div class="card-body">
                                                      <div class="timeline-icon bg-white fs-lg">
                                                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em">
                                                            <path class="quarter-fill" d="M12,14.19531a1.00211,1.00211,0,0,1-.5-.13379l-9-5.19726a1.00032,1.00032,0,0,1,0-1.73242l9-5.19336a1.00435,1.00435,0,0,1,1,0l9,5.19336a1.00032,1.00032,0,0,1,0,1.73242l-9,5.19726A1.00211,1.00211,0,0,1,12,14.19531Z">
                                                            </path>
                                                            <path class="half-fill" d="M21.5,11.13184,19.53589,9.99847,12.5,14.06152a1.0012,1.0012,0,0,1-1,0L4.46411,9.99847,2.5,11.13184a1.00032,1.00032,0,0,0,0,1.73242l9,5.19726a1.0012,1.0012,0,0,0,1,0l9-5.19726a1.00032,1.00032,0,0,0,0-1.73242Z">
                                                            </path>
                                                            <path class="full-fill" d="M21.5,15.13184l-1.96411-1.13337L12.5,18.06152a1.0012,1.0012,0,0,1-1,0L4.46411,13.99847,2.5,15.13184a1.00032,1.00032,0,0,0,0,1.73242l9,5.19726a1.0012,1.0012,0,0,0,1,0l9-5.19726a1.00032,1.00032,0,0,0,0-1.73242Z">
                                                            </path>
                                                         </svg>
                                                      </div>
                                                      <div class="d-inline-block py-1 px-3 bg-soft-primary text-primary fw-semibold badge-pill rounded-1">
                                                         2019 - 20
                                                      </div>
                                                      <h6 class="fs-15 fw-semibold mt-3">Letstart Single Page Website</h6>
                                                      <div class="text-muted">
                                                         <p class="mb-0">Letstart SP - A parallax modern responsive web template</p>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="timeline-primary">
                                             <div class="timeline-item">
                                                <div class="timeline-box card w-100">
                                                   <div class="card-body">
                                                      <div class="timeline-icon bg-white fs-lg">
                                                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em">
                                                            <path class="quarter-fill" d="M12,14.19531a1.00211,1.00211,0,0,1-.5-.13379l-9-5.19726a1.00032,1.00032,0,0,1,0-1.73242l9-5.19336a1.00435,1.00435,0,0,1,1,0l9,5.19336a1.00032,1.00032,0,0,1,0,1.73242l-9,5.19726A1.00211,1.00211,0,0,1,12,14.19531Z">
                                                            </path>
                                                            <path class="half-fill" d="M21.5,11.13184,19.53589,9.99847,12.5,14.06152a1.0012,1.0012,0,0,1-1,0L4.46411,9.99847,2.5,11.13184a1.00032,1.00032,0,0,0,0,1.73242l9,5.19726a1.0012,1.0012,0,0,0,1,0l9-5.19726a1.00032,1.00032,0,0,0,0-1.73242Z">
                                                            </path>
                                                            <path class="full-fill" d="M21.5,15.13184l-1.96411-1.13337L12.5,18.06152a1.0012,1.0012,0,0,1-1,0L4.46411,13.99847,2.5,15.13184a1.00032,1.00032,0,0,0,0,1.73242l9,5.19726a1.0012,1.0012,0,0,0,1,0l9-5.19726a1.00032,1.00032,0,0,0,0-1.73242Z">
                                                            </path>
                                                         </svg>
                                                      </div>
                                                      <div class="d-inline-block py-1 px-3 bg-soft-primary text-primary fw-semibold badge-pill rounded-1">
                                                         2017 - 19
                                                      </div>
                                                      <h6 class="fs-15 fw-semibold mt-3">Letstart Admin Devlopment</h6>
                                                      <div class="text-muted">
                                                         <p class="mb-0">Letstart Admin - A responsive admin and dashboard template</p>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 pl-xl-5">
                                       <h5 class="fw-semibold text-dark mb-4 mt-4 mt-lg-0">Công nhận chính thức</h5>
                                       <div class="timeline-left-only ms-3">
                                          <div class="timeline-primary">
                                             <div class="timeline-item w-">
                                                <div class="timeline-box card w-100">
                                                   <div class="card-body">
                                                      <div class="timeline-icon bg-white fs-lg">
                                                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em">
                                                            <path class="quarter-fill" d="M12,14.19531a1.00211,1.00211,0,0,1-.5-.13379l-9-5.19726a1.00032,1.00032,0,0,1,0-1.73242l9-5.19336a1.00435,1.00435,0,0,1,1,0l9,5.19336a1.00032,1.00032,0,0,1,0,1.73242l-9,5.19726A1.00211,1.00211,0,0,1,12,14.19531Z">
                                                            </path>
                                                            <path class="half-fill" d="M21.5,11.13184,19.53589,9.99847,12.5,14.06152a1.0012,1.0012,0,0,1-1,0L4.46411,9.99847,2.5,11.13184a1.00032,1.00032,0,0,0,0,1.73242l9,5.19726a1.0012,1.0012,0,0,0,1,0l9-5.19726a1.00032,1.00032,0,0,0,0-1.73242Z">
                                                            </path>
                                                            <path class="full-fill" d="M21.5,15.13184l-1.96411-1.13337L12.5,18.06152a1.0012,1.0012,0,0,1-1,0L4.46411,13.99847,2.5,15.13184a1.00032,1.00032,0,0,0,0,1.73242l9,5.19726a1.0012,1.0012,0,0,0,1,0l9-5.19726a1.00032,1.00032,0,0,0,0-1.73242Z">
                                                            </path>
                                                         </svg>
                                                      </div>
                                                      <div class="d-inline-block py-1 px-3 bg-soft-primary text-primary fw-semibold badge-pill rounded-1">
                                                         2018 - 19
                                                      </div>
                                                      <h6 class="fs-15 fw-semibold mt-3">Appco Website</h6>
                                                      <div class="text-muted">
                                                         <p class="mb-0">Appco Website - A responsive web template</p>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="timeline-primary">
                                             <div class="timeline-item">
                                                <div class="timeline-box card w-100">
                                                   <div class="card-body">
                                                      <div class="timeline-icon bg-white fs-lg">
                                                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em">
                                                            <path class="quarter-fill" d="M12,14.19531a1.00211,1.00211,0,0,1-.5-.13379l-9-5.19726a1.00032,1.00032,0,0,1,0-1.73242l9-5.19336a1.00435,1.00435,0,0,1,1,0l9,5.19336a1.00032,1.00032,0,0,1,0,1.73242l-9,5.19726A1.00211,1.00211,0,0,1,12,14.19531Z">
                                                            </path>
                                                            <path class="half-fill" d="M21.5,11.13184,19.53589,9.99847,12.5,14.06152a1.0012,1.0012,0,0,1-1,0L4.46411,9.99847,2.5,11.13184a1.00032,1.00032,0,0,0,0,1.73242l9,5.19726a1.0012,1.0012,0,0,0,1,0l9-5.19726a1.00032,1.00032,0,0,0,0-1.73242Z">
                                                            </path>
                                                            <path class="full-fill" d="M21.5,15.13184l-1.96411-1.13337L12.5,18.06152a1.0012,1.0012,0,0,1-1,0L4.46411,13.99847,2.5,15.13184a1.00032,1.00032,0,0,0,0,1.73242l9,5.19726a1.0012,1.0012,0,0,0,1,0l9-5.19726a1.00032,1.00032,0,0,0,0-1.73242Z">
                                                            </path>
                                                         </svg>
                                                      </div>
                                                      <div class="d-inline-block py-1 px-3 bg-soft-primary text-primary fw-semibold badge-pill rounded-1">
                                                         2019 - 20
                                                      </div>
                                                      <h6 class="fs-15 fw-semibold mt-3">Letstart Single Page Website</h6>
                                                      <div class="text-muted">
                                                         <p class="mb-0">Letstart SP - A parallax modern responsive web template</p>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="timeline-primary">
                                             <div class="timeline-item">
                                                <div class="timeline-box card w-100">
                                                   <div class="card-body">
                                                      <div class="timeline-icon bg-white fs-lg">
                                                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em">
                                                            <path class="quarter-fill" d="M12,14.19531a1.00211,1.00211,0,0,1-.5-.13379l-9-5.19726a1.00032,1.00032,0,0,1,0-1.73242l9-5.19336a1.00435,1.00435,0,0,1,1,0l9,5.19336a1.00032,1.00032,0,0,1,0,1.73242l-9,5.19726A1.00211,1.00211,0,0,1,12,14.19531Z">
                                                            </path>
                                                            <path class="half-fill" d="M21.5,11.13184,19.53589,9.99847,12.5,14.06152a1.0012,1.0012,0,0,1-1,0L4.46411,9.99847,2.5,11.13184a1.00032,1.00032,0,0,0,0,1.73242l9,5.19726a1.0012,1.0012,0,0,0,1,0l9-5.19726a1.00032,1.00032,0,0,0,0-1.73242Z">
                                                            </path>
                                                            <path class="full-fill" d="M21.5,15.13184l-1.96411-1.13337L12.5,18.06152a1.0012,1.0012,0,0,1-1,0L4.46411,13.99847,2.5,15.13184a1.00032,1.00032,0,0,0,0,1.73242l9,5.19726a1.0012,1.0012,0,0,0,1,0l9-5.19726a1.00032,1.00032,0,0,0,0-1.73242Z">
                                                            </path>
                                                         </svg>
                                                      </div>
                                                      <div class="d-inline-block py-1 px-3 bg-soft-primary text-primary fw-semibold badge-pill rounded-1">
                                                         2017 - 19
                                                      </div>
                                                      <h6 class="fs-15 fw-semibold mt-3">Letstart Admin Devlopment</h6>
                                                      <div class="text-muted">
                                                         <p class="mb-0">Letstart Admin - A responsive admin and dashboard template</p>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="tab-pane fade" id="pills-projects" role="tabpanel" aria-labelledby="pills-projects-tab">

                                 <div class="row mt-3">
                                    <div class="col-lg-6">
                                       <div class="card">
                                          <div class="card-body">
                                             <div class="media">
                                                <div class="avatar bg-soft-success text-success">
                                                   AG
                                                </div>
                                                <div class="media-body overflow-hidden">
                                                   <h5 class="card-title mb-2 pr-4 text-truncate"><a href="#" class="text-dark" title="Landing page Design">Landing page Design</a></h5>
                                                   <p class="text-muted mb-3">Lorem Ipsum is simply dummy text of the printing and
                                                      typesetting.</p>
                                                   <div class="circle-condense-profiles">
                                                      <a href="javascript: void(0);" class="condense-profile" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="ProfileUser">
                                                         <img src="public/dist/data/images/users/avatar-2.jpg" alt="Lettstart Admin" class="avatar-sm rounded-circle">
                                                      </a>
                                                      <a href="javascript: void(0);" class="condense-profile" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="ProfileUser">
                                                         <img src="public/dist/data/images/users/avatar-3.jpg" alt="Lettstart Admin" class="avatar-sm rounded-circle">
                                                      </a>
                                                      <a href="javascript: void(0);" class="condense-profile" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="ProfileUser">
                                                         <img src="public/dist/data/images/users/avatar-4.jpg" alt="Lettstart Admin" class="avatar-sm rounded-circle">
                                                      </a>
                                                      <a href="javascript: void(0);" class="condense-profile" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="ProfileUser">
                                                         <div class="avatar bg-white text-secondary op-6 fw-bold avatar-sm me-0">
                                                            +3</div>
                                                      </a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="card-body border-top">
                                             <div class="row align-items-center justify-content-between">
                                                <div class="col-auto">
                                                   <ul class="list-inline mb-0">
                                                      <li class="list-inline-item">
                                                         <h5 class="fs-14 mb-0" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Task">
                                                            <i class="bx bx-list-ul fs-sm text-secondary op-6 align-middle"></i>
                                                            <span class="align-middle">76</span>
                                                         </h5>
                                                      </li>
                                                      <li class="list-inline-item">
                                                         <h5 class="fs-14 mb-0" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Comments">
                                                            <i class="bx bx-comment-detail fs-sm text-secondary op-6 align-middle"></i>
                                                            <span class="align-middle">240</span>
                                                         </h5>
                                                      </li>
                                                   </ul>
                                                </div>
                                                <div class="col pl-2">
                                                   <span class="badge bg-success float-end">Completed</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="dropdown edit-field-half-left">
                                             <div class="btn-icon btn-icon-sm btn-icon-soft-primary dropdown-toggle me-0 edit-field-icon" data-bs-toggle="dropdown">
                                                <i class="mdi mdi-dots-vertical fs-sm"></i>
                                             </div>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">
                                                   <i class="mdi mdi-pencil align-middle me-1 text-primary"></i>
                                                   <span>Edit</span>
                                                </a>
                                                <a href="#" class="dropdown-item">
                                                   <i class="mdi mdi-delete align-middle me-1 text-danger"></i>
                                                   <span>Delete</span>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end card -->
                                    </div><!-- end col-4 -->
                                    <div class="col-lg-6">
                                       <div class="card">
                                          <div class="card-body">
                                             <div class="media">
                                                <img src="public/dist/data/images/projects-logo/project1.jpg" class="avatar rounded-circle" width="30" alt="Lettstart Admin" />
                                                <div class="media-body overflow-hidden">
                                                   <h5 class="card-title mb-2 pr-4 text-truncate">
                                                      <a href="#" class="text-dark" title="Option 2 App Design, Development and Maintenance">Option 2 App Design,
                                                         Development and Maintenance</a>
                                                   </h5>
                                                   <p class="text-muted mb-3">Lorem Ipsum is simply dummy text of the printing and
                                                      typesetting.</p>
                                                   <div>
                                                      <a href="javascript: void(0);" class="me-1" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="ProfileUser">
                                                         <img src="public/dist/data/images/users/avatar-2.jpg" alt="Lettstart Admin" class="avatar-sm rounded-circle">
                                                      </a>
                                                      <a href="javascript: void(0);" class="me-1" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="ProfileUser">
                                                         <img src="public/dist/data/images/users/avatar-3.jpg" alt="Lettstart Admin" class="avatar-sm rounded-circle">
                                                      </a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="card-body border-top">
                                             <div class="row align-items-center justify-content-between">
                                                <div class="col-auto">
                                                   <ul class="list-inline mb-0">
                                                      <li class="list-inline-item">
                                                         <h5 class="fs-14 mb-0" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Task">
                                                            <i class="bx bx-list-ul fs-sm text-secondary op-6 align-middle"></i>
                                                            <span class="align-middle">80</span>
                                                         </h5>
                                                      </li>
                                                      <li class="list-inline-item">
                                                         <h5 class="fs-14 mb-0" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Comments">
                                                            <i class="bx bx-comment-detail fs-sm text-secondary op-6 align-middle"></i>
                                                            <span class="align-middle">200</span>
                                                         </h5>
                                                      </li>
                                                   </ul>
                                                </div>
                                                <div class="col pl-2">
                                                   <span class="badge bg-warning text-white float-end">In Progress</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="dropdown edit-field-half-left">
                                             <div class="btn-icon btn-icon-sm btn-icon-soft-primary dropdown-toggle me-0 edit-field-icon" data-bs-toggle="dropdown">
                                                <i class="mdi mdi-dots-vertical fs-sm"></i>
                                             </div>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">
                                                   <i class="mdi mdi-pencil align-middle me-1 text-primary"></i>
                                                   <span>Edit</span>
                                                </a>
                                                <a href="#" class="dropdown-item">
                                                   <i class="mdi mdi-delete align-middle me-1 text-danger"></i>
                                                   <span>Delete</span>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end card -->
                                    </div><!-- end col-4 -->
                                    <div class="col-lg-6">
                                       <div class="card">
                                          <div class="card-body">
                                             <div class="media">
                                                <img src="public/dist/data/images/projects-logo/project2.jpg" class="avatar rounded-circle" width="30" alt="Lettstart Admin" />
                                                <div class="media-body overflow-hidden">
                                                   <h5 class="card-title mb-2 pr-4 text-truncate">
                                                      <a href="#" class="text-dark" title="Landing page Design">Option 3 Admin page
                                                         design</a>
                                                   </h5>
                                                   <p class="text-muted mb-3">Lorem Ipsum is simply dummy text of the printing and
                                                      typesetting.</p>
                                                   <div>
                                                      <a href="javascript: void(0);" class="me-1" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="ProfileUser">
                                                         <img src="public/dist/data/images/users/avatar-2.jpg" alt="Lettstart Admin" class="avatar-sm rounded-circle">
                                                      </a>
                                                      <a href="javascript: void(0);" class="avatar avatar-sm bg-soft-info text-info me-1" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="ProfileUser">
                                                         JD
                                                      </a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="card-body border-top">
                                             <div class="row align-items-center justify-content-between">
                                                <div class="col-auto">
                                                   <ul class="list-inline mb-0">
                                                      <li class="list-inline-item">
                                                         <h5 class="fs-14 mb-0" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Task">
                                                            <i class="bx bx-list-ul fs-sm text-secondary op-6 align-middle"></i>
                                                            <span class="align-middle">85</span>
                                                         </h5>
                                                      </li>
                                                      <li class="list-inline-item">
                                                         <h5 class="fs-14 mb-0" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Comments">
                                                            <i class="bx bx-comment-detail fs-sm text-secondary op-6 align-middle"></i>
                                                            <span class="align-middle">150</span>
                                                         </h5>
                                                      </li>
                                                   </ul>
                                                </div>
                                                <div class="col">
                                                   <span class="badge bg-danger float-end">Delay</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="dropdown edit-field-half-left">
                                             <div class="btn-icon btn-icon-sm btn-icon-soft-primary dropdown-toggle me-0 edit-field-icon" data-bs-toggle="dropdown">
                                                <i class="mdi mdi-dots-vertical fs-sm"></i>
                                             </div>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">
                                                   <i class="mdi mdi-pencil align-middle me-1 text-primary"></i>
                                                   <span>Edit</span>
                                                </a>
                                                <a href="#" class="dropdown-item">
                                                   <i class="mdi mdi-delete align-middle me-1 text-danger"></i>
                                                   <span>Delete</span>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end card -->
                                    </div><!-- end col-4 -->
                                    <div class="col-lg-6">
                                       <div class="card">
                                          <div class="card-body">
                                             <div class="media">
                                                <img src="public/dist/data/images/projects-logo/project3.jpg" class="avatar rounded-circle" width="30" alt="Lettstart Admin" />
                                                <div class="media-body overflow-hidden">
                                                   <h5 class="card-title mb-2 pr-4 text-truncate"><a href="#" class="text-dark" title="Landing page Design">Option 4 Blog Template Design</a></h5>
                                                   <p class="text-muted mb-3">Lorem Ipsum is simply dummy text of the printing and
                                                      typesetting.</p>
                                                   <div class="circle-condense-profiles">
                                                      <a href="javascript: void(0);" class="condense-profile" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="ProfileUser">
                                                         <span class="avatar avatar-sm bg-soft-info text-info me-0">DS</span>
                                                      </a>
                                                      <a href="javascript: void(0);" class="condense-profile" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="ProfileUser">
                                                         <span class="avatar avatar-sm bg-soft-info text-info me-0">JM</span>
                                                      </a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="card-body border-top">
                                             <div class="row align-items-center justify-content-between">
                                                <div class="col-auto">
                                                   <ul class="list-inline mb-0">
                                                      <li class="list-inline-item">
                                                         <h5 class="fs-14 mb-0" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Task">
                                                            <i class="bx bx-list-ul fs-sm text-secondary op-6 align-middle"></i>
                                                            <span class="align-middle">60</span>
                                                         </h5>
                                                      </li>
                                                      <li class="list-inline-item">
                                                         <h5 class="fs-14 mb-0" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Comments">
                                                            <i class="bx bx-comment-detail fs-sm text-secondary op-6 align-middle"></i>
                                                            <span class="align-middle">120</span>
                                                         </h5>
                                                      </li>
                                                   </ul>
                                                </div>
                                                <div class="col pl-2">
                                                   <span class="badge bg-success float-end">Completed</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="dropdown edit-field-half-left">
                                             <div class="btn-icon btn-icon-sm btn-icon-soft-primary dropdown-toggle me-0 edit-field-icon" data-bs-toggle="dropdown">
                                                <i class="mdi mdi-dots-vertical fs-sm"></i>
                                             </div>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">
                                                   <i class="mdi mdi-pencil align-middle me-1 text-primary"></i>
                                                   <span>Edit</span>
                                                </a>
                                                <a href="#" class="dropdown-item">
                                                   <i class="mdi mdi-delete align-middle me-1 text-danger"></i>
                                                   <span>Delete</span>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end card -->
                                    </div><!-- end col-4 -->
                                    <div class="col-lg-6">
                                       <div class="card">
                                          <div class="card-body">
                                             <div class="media">
                                                <img src="public/dist/data/images/projects-logo/project4.jpg" class="avatar rounded-circle" width="30" alt="Lettstart Admin" />
                                                <div class="media-body overflow-hidden">
                                                   <h5 class="card-title mb-2 pr-4 text-truncate">
                                                      <a href="#" class="text-dark" title="App Design and Development">Homepage
                                                         Redesign</a>
                                                   </h5>
                                                   <p class="text-muted mb-3">Lorem Ipsum is simply dummy text of the printing and
                                                      typesetting.</p>
                                                   <div>
                                                      <a href="javascript: void(0);" class="me-1" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="ProfileUser">
                                                         <img src="public/dist/data/images/users/avatar-2.jpg" alt="Lettstart Admin" class="avatar-sm rounded-circle">
                                                      </a>
                                                      <a href="javascript: void(0);" class="me-1" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="ProfileUser">
                                                         <img src="public/dist/data/images/users/avatar-3.jpg" alt="Lettstart Admin" class="avatar-sm rounded-circle">
                                                      </a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="card-body border-top">
                                             <div class="row align-items-center justify-content-between">
                                                <div class="col-auto">
                                                   <ul class="list-inline mb-0">
                                                      <li class="list-inline-item">
                                                         <h5 class="fs-14 mb-0" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Task">
                                                            <i class="bx bx-list-ul fs-sm text-secondary op-6 align-middle"></i>
                                                            <span class="align-middle">100</span>
                                                         </h5>
                                                      </li>
                                                      <li class="list-inline-item">
                                                         <h5 class="fs-14 mb-0" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Comments">
                                                            <i class="bx bx-comment-detail fs-sm text-secondary op-6 align-middle"></i>
                                                            <span class="align-middle">400</span>
                                                         </h5>
                                                      </li>
                                                   </ul>
                                                </div>
                                                <div class="col pl-2">
                                                   <span class="badge bg-success text-white float-end">Completed</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="dropdown edit-field-half-left">
                                             <div class="btn-icon btn-icon-sm btn-icon-soft-primary dropdown-toggle me-0 edit-field-icon" data-bs-toggle="dropdown">
                                                <i class="mdi mdi-dots-vertical fs-sm"></i>
                                             </div>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">
                                                   <i class="mdi mdi-pencil align-middle me-1 text-primary"></i>
                                                   <span>Edit</span>
                                                </a>
                                                <a href="#" class="dropdown-item">
                                                   <i class="mdi mdi-delete align-middle me-1 text-danger"></i>
                                                   <span>Delete</span>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end card -->
                                    </div><!-- end col-4 -->
                                    <div class="col-lg-6">
                                       <div class="card">
                                          <div class="card-body">
                                             <div class="media">
                                                <img src="public/dist/data/images/projects-logo/project2.jpg" class="avatar rounded-circle" width="30" alt="Lettstart Admin" />
                                                <div class="media-body overflow-hidden">
                                                   <h5 class="card-title mb-2 pr-4 text-truncate"><a href="#" class="text-dark" title="Landing page Design">Mobile Development</a></h5>
                                                   <p class="text-muted mb-3">Lorem Ipsum is simply dummy text of the printing and
                                                      typesetting.</p>
                                                   <div>
                                                      <a href="javascript: void(0);" class="me-1" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="ProfileUser">
                                                         <img src="public/dist/data/images/users/avatar-2.jpg" alt="Lettstart Admin" class="avatar-sm rounded-circle">
                                                      </a>
                                                      <a href="javascript: void(0);" class="avatar avatar-sm bg-soft-info text-info me-1" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="ProfileUser">
                                                         JD
                                                      </a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="card-body border-top">
                                             <div class="row align-items-center justify-content-between">
                                                <div class="col-auto">
                                                   <ul class="list-inline mb-0">
                                                      <li class="list-inline-item">
                                                         <h5 class="fs-14 mb-0" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Task">
                                                            <i class="bx bx-list-ul fs-sm text-secondary op-6 align-middle"></i>
                                                            <span class="align-middle">10</span>
                                                         </h5>
                                                      </li>
                                                      <li class="list-inline-item">
                                                         <h5 class="fs-14 mb-0" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Comments">
                                                            <i class="bx bx-comment-detail fs-sm text-secondary op-6 align-middle"></i>
                                                            <span class="align-middle">40</span>
                                                         </h5>
                                                      </li>
                                                   </ul>
                                                </div>
                                                <div class="col">
                                                   <span class="badge bg-warning text-white float-end">In Progress</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="dropdown edit-field-half-left">
                                             <div class="btn-icon btn-icon-sm btn-icon-soft-primary dropdown-toggle me-0 edit-field-icon" data-bs-toggle="dropdown">
                                                <i class="mdi mdi-dots-vertical fs-sm"></i>
                                             </div>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">
                                                   <i class="mdi mdi-pencil align-middle me-1 text-primary"></i>
                                                   <span>Edit</span>
                                                </a>
                                                <a href="#" class="dropdown-item">
                                                   <i class="mdi mdi-delete align-middle me-1 text-danger"></i>
                                                   <span>Delete</span>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end card -->
                                    </div><!-- end col-4 -->
                                 </div>
                                 <!-- end row -->
                              </div>

                              <div class="tab-pane fade" id="pills-tasks" role="tabpanel" aria-labelledby="pills-tasks-tab">
                                 <div class="card mb-0 shadow-none" data-plugin="dragula" data-containers='["task-list-one"]' data-handleClass="dragula-handle">
                                    <div class="card-header p-0">
                                       <h5 class="card-title"> Assigned Task </h5>
                                    </div>
                                    <div class="card-body p-0" id="task-list-one">
                                       <!-- task -->
                                       <div class="row g-0 border-bottom align-items-center">
                                          <div class="col-md-6 mt-2">
                                             <div class="d-flex">
                                                <div class="dragula-handle">
                                                </div>
                                                <div class="form-check custom-checkbox align-self-center col">
                                                   <input type="checkbox" class="form-check-input" id="task1">
                                                   <label class="form-check-label" for="task1">
                                                      Draft the new contract document for
                                                      sales team
                                                   </label>
                                                </div> <!-- end checkbox -->
                                             </div>
                                          </div> <!-- end col -->
                                          <div class="col-md-6 my-2">
                                             <div class="d-flex align-items-center justify-content-md-end fs-14">
                                                <div class="me-3">
                                                   <img src="public/dist/data/images/users/avatar-9.jpg" alt="image" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-placement="bottom" title="Assigned to Arya S" />
                                                </div>
                                                <ul class="list-inline mb-0">
                                                   <li class="list-inline-item pr-1">
                                                      <i class='bx bx-calendar me-1'></i>
                                                      10am
                                                   </li>
                                                   <li class="list-inline-item pr-2">
                                                      <i class='bx bx-comment-dots me-1'></i>
                                                      21
                                                   </li>
                                                   <li class="list-inline-item">
                                                      <span class="badge badge-soft-danger p-1">High</span>
                                                   </li>
                                                </ul>
                                             </div> <!-- end .d-flex-->
                                          </div> <!-- end col -->
                                       </div>
                                       <!-- end task -->

                                       <!-- task -->
                                       <div class="row g-0 border-bottom align-items-center">
                                          <div class="col-md-6 mt-2">
                                             <div class="d-flex">
                                                <div class="dragula-handle">
                                                </div>
                                                <div class="form-check custom-checkbox align-self-center col">
                                                   <input type="checkbox" class="form-check-input" id="task2">
                                                   <label class="form-check-label" for="task2">
                                                      iOS App home page
                                                   </label>
                                                </div> <!-- end checkbox -->
                                             </div>
                                          </div> <!-- end col -->
                                          <div class="col-md-6 my-2">
                                             <div class="d-flex align-items-center justify-content-md-end fs-14">
                                                <div class="me-3">
                                                   <img src="public/dist/data/images/users/avatar-2.jpg" alt="image" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-placement="bottom" title="Assigned to James B" />
                                                </div>
                                                <ul class="list-inline mb-0">
                                                   <li class="list-inline-item pr-1">
                                                      <i class='bx bx-calendar me-1'></i>
                                                      4pm
                                                   </li>
                                                   <li class="list-inline-item pr-2">
                                                      <i class='bx bx-comment-dots me-1'></i>
                                                      48
                                                   </li>
                                                   <li class="list-inline-item">
                                                      <span class="badge badge-soft-danger p-1">High</span>
                                                   </li>
                                                </ul>
                                             </div> <!-- end .d-flex-->
                                          </div> <!-- end col -->
                                       </div>
                                       <!-- end task -->

                                       <!-- task -->
                                       <div class="row g-0 border-bottom align-items-center">
                                          <div class="col-md-6 mt-2">
                                             <div class="d-flex">
                                                <div class="dragula-handle">
                                                </div>
                                                <div class="form-check custom-checkbox align-self-center col">
                                                   <input type="checkbox" class="form-check-input" id="task3">
                                                   <label class="form-check-label" for="task3">
                                                      Write a release note
                                                   </label>
                                                </div> <!-- end checkbox -->
                                             </div>
                                          </div> <!-- end col -->
                                          <div class="col-md-6 my-2">
                                             <div class="d-flex align-items-center justify-content-md-end fs-14">
                                                <div class="me-3">
                                                   <img src="public/dist/data/images/users/avatar-4.jpg" alt="image" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-placement="bottom" title="Assigned to Kevin C" />
                                                </div>
                                                <ul class="list-inline mb-0">
                                                   <li class="list-inline-item pr-1">
                                                      <i class='bx bx-calendar me-1'></i>
                                                      6pm
                                                   </li>
                                                   <li class="list-inline-item pr-2">
                                                      <i class='bx bx-comment-dots me-1'></i>
                                                      73
                                                   </li>
                                                   <li class="list-inline-item">
                                                      <span class="badge badge-soft-info p-1">Medium</span>
                                                   </li>
                                                </ul>
                                             </div> <!-- end .d-flex-->
                                          </div> <!-- end col -->
                                       </div>
                                       <!-- end task -->

                                       <!-- task -->
                                       <div class="row g-0 border-bottom align-items-center">
                                          <div class="col-md-6 mt-2">
                                             <div class="d-flex">
                                                <div class="dragula-handle">
                                                </div>
                                                <div class="form-check custom-checkbox align-self-center col">
                                                   <input type="checkbox" class="form-check-input" id="task4">
                                                   <label class="form-check-label" for="task4">
                                                      Invite user to a project
                                                   </label>
                                                </div> <!-- end checkbox -->
                                             </div>
                                          </div> <!-- end col -->
                                          <div class="col-lg-6 my-2">
                                             <div class="d-flex align-items-center justify-content-md-end fs-14">
                                                <div class="me-3">
                                                   <img src="public/dist/data/images/users/avatar-2.jpg" alt="image" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-placement="bottom" title="Assigned to James B" />
                                                </div>
                                                <ul class="list-inline mb-0">
                                                   <li class="list-inline-item pr-1">
                                                      <i class='bx bx-calendar me-1'></i>
                                                      Tomorrow,
                                                      7am
                                                   </li>
                                                   <li class="list-inline-item pr-1">
                                                      <i class='bx bx-align-middle me-1'></i>
                                                      1/12
                                                   </li>
                                                   <li class="list-inline-item pr-2">
                                                      <i class='bx bx-comment-dots me-1'></i>
                                                      36
                                                   </li>
                                                   <li class="list-inline-item">
                                                      <span class="badge badge-soft-danger p-1">High</span>
                                                   </li>
                                                </ul>
                                             </div> <!-- end .d-flex-->
                                          </div> <!-- end col -->
                                       </div>
                                       <!-- end task -->

                                       <!-- task -->
                                       <div class="row g-0 border-bottom align-items-center">
                                          <div class="col-md-6 mt-2">
                                             <div class="d-flex">
                                                <div class="dragula-handle">
                                                </div>
                                                <div class="form-check custom-checkbox align-self-center col">
                                                   <input type="checkbox" class="form-check-input" id="task5">
                                                   <label class="form-check-label" for="task5">
                                                      Enable analytics tracking
                                                   </label>
                                                </div> <!-- end checkbox -->
                                             </div>
                                          </div> <!-- end col -->
                                          <div class="col-lg-6 my-2">
                                             <div class="d-flex align-items-center justify-content-md-end fs-14">
                                                <div class="me-3">
                                                   <img src="public/dist/data/images/users/avatar-2.jpg" alt="image" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-placement="bottom" title="Assigned to James B" />
                                                </div>
                                                <ul class="list-inline mb-0">
                                                   <li class="list-inline-item pr-1">
                                                      <i class='bx bx-calendar me-1'></i>
                                                      27 Aug,
                                                      10am
                                                   </li>
                                                   <li class="list-inline-item pr-1">
                                                      <i class='bx bx-align-middle me-1'></i>
                                                      13/72
                                                   </li>
                                                   <li class="list-inline-item pr-2">
                                                      <i class='bx bx-comment-dots me-1'></i>
                                                      211
                                                   </li>
                                                   <li class="list-inline-item">
                                                      <span class="badge badge-soft-success p-1">Low</span>
                                                   </li>
                                                </ul>
                                             </div> <!-- end .d-flex-->
                                          </div> <!-- end col -->
                                       </div>
                                       <!-- end task -->

                                       <!-- task -->
                                       <div class="row g-0 border-bottom align-items-center">
                                          <div class="col-md-6 mt-2">
                                             <div class="d-flex">
                                                <div class="dragula-handle">
                                                </div>
                                                <div class="form-check custom-checkbox align-self-center col">
                                                   <input type="checkbox" class="form-check-input" id="task6">
                                                   <label class="form-check-label" for="task6">
                                                      Code HTML email template
                                                   </label>
                                                </div> <!-- end checkbox -->
                                             </div>
                                          </div> <!-- end col -->
                                          <div class="col-lg-6 my-2">
                                             <div class="d-flex align-items-center justify-content-md-end fs-14">
                                                <div class="me-3">
                                                   <img src="public/dist/data/images/users/avatar-7.jpg" alt="image" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-placement="bottom" title="Assigned to Edward S" />
                                                </div>
                                                <ul class="list-inline mb-0">
                                                   <li class="list-inline-item pr-1">
                                                      <i class='bx bx-calendar me-1'></i>
                                                      No Due
                                                      Date
                                                   </li>
                                                   <li class="list-inline-item pr-1">
                                                      <i class='bx bx-align-middle me-1'></i>
                                                      0/7
                                                   </li>
                                                   <li class="list-inline-item pr-2">
                                                      <i class='bx bx-comment-dots me-1'></i>
                                                      0
                                                   </li>
                                                   <li class="list-inline-item">
                                                      <span class="badge badge-soft-info p-1">Medium</span>
                                                   </li>
                                                </ul>
                                             </div> <!-- end .d-flex-->
                                          </div> <!-- end col -->
                                       </div>
                                       <!-- end task -->
                                       <div class="text-center mt-4">
                                          <a href="javascript:void(0);" class="btn btn-sm btn-white">
                                             <i class="bx bx-loader me-1 align-middle bx-spin"></i>
                                             <span class="align-middle">Load more</span>
                                          </a>
                                       </div>
                                    </div> <!-- end card-body-->
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-tasks-tab">
                                 <div class="card mb-0 shadow-none">
                                    <div class="card-header p-0">
                                       <h5 class="card-title"> Edit Member Details</h5>
                                    </div>
                                    <div class="card-body px-0">
                                       <form action="#" novalidate="novalidate" id="addprofileform" data-type="edit">
                                          <div class="row">
                                             <div class="col-lg-6">
                                                <div class="form-group floating-label enable-floating-label show-label">
                                                   <input class="form-control" id="fname" name="validation-firstname" type="text" placeholder="John" value="John">
                                                   <label for="fname">First Name<span class="text-danger">*</span></label>
                                                   <div class="validation-error d-none fs-13">
                                                      First name can not be blank.
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-lg-6">
                                                <div class="form-group floating-label enable-floating-label show-label">
                                                   <input class="form-control" id="lname" name="validation-lastname" type="text" placeholder="Doe" value="doe">
                                                   <label for="lname">Last Name</label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-lg-6">
                                                <div class="form-group floating-label enable-floating-label show-label">
                                                   <input class="form-control" id="desig" name="validation-designation" type="text" placeholder="UI/UX Specialist" value="UI specialist">
                                                   <label for="desig">Designation<span class="text-danger">*</span></label>
                                                   <div class="validation-error d-none fs-13">
                                                      Designation can not be blank.
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-lg-6">
                                                <div class="form-group floating-label enable-floating-label show-label">
                                                   <input class="form-control" id="email" name="validation-email" type="text" placeholder="example@example.com" value="example@example.com">
                                                   <label for="email">Email Address<span class="text-danger">*</span></label>
                                                   <div class="validation-error d-none fs-13">
                                                      Please enter valid Email
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-lg-6">
                                                <div class="form-group floating-label enable-floating-label show-label">
                                                   <input class="form-control" id="tel" name="validation-phone" type="text" placeholder="123-787-87477" value="11-557-87878">
                                                   <label for="tel">Phone No.<span class="text-danger">*</span></label>
                                                   <div class="validation-error d-none fs-13">
                                                      Please enter valid number
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-lg-6">
                                                <div class="form-group floating-label enable-floating-label show-label">
                                                   <select class="form-control" id="citizenship" name="validation-country">
                                                      <option value="india">Indian</option>
                                                      <option value="england" selected>British</option>
                                                      <option value="usa">USA</option>
                                                      <option value="china">Chine</option>
                                                      <option value="japan">Japan</option>
                                                   </select>
                                                   <label>Choose Citizenship<span class="text-danger">*</span></label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group floating-label enable-floating-label show-label">
                                             <textarea class="form-control" id="address" rows="3" name="validation-address" placeholder="xyz, lane, new delhi, 121001 india">xyz, lane, new delhi, 121001 india</textarea>
                                             <label for="address">Address</label>
                                          </div>
                                          <div class="form-group floating-label enable-floating-label show-label">
                                             <label for="address">Skills<span class="text-danger">*</span></label>
                                             <input class="form-control" id="skillstags" name="validation-skills" value="js, eng" />
                                             <div class="validation-error d-none fs-13">
                                                Please enter atleast one skill
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <textarea name="validation-editor" id="profile-desc">Member Description...</textarea>
                                             <div class="validation-error d-none fs-13">
                                                Item description can not be blank
                                             </div>
                                          </div>
                                          <div class="pt-4">
                                             <button class="btn btn-primary ms-1" data-effect="wave" type="submit">Add
                                                Contact</button>
                                             <button class="btn btn-secondary" data-effect="wave" type="button" id="reset-profile-form">Reset</button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>

                        </div>
                     </div>
                     <!-- end card -->
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- chat box -->
      <div class="chatbox-wrapper overflow-hidden minimize" style="display: none;">
         <div class="chat-profile p-2 bg-primary d-flex align-items-center">
            <div class="dropdown me-2">
               <a href="javascript:void(0)" class="dropdown-toggle" data-bs-toggle="dropdown">
                  <img src="public/dist/data/images/users/avatar-1.jpg" alt="Header Avatar" class="online avatar avatar-sm me-0">
               </a>
               <div class="dropdown-menu">
                  <a href="javascript:void(0)" class="dropdown-item" data-status="online"><span class="status-circle online me-2"></span> Online</a>
                  <a href="javascript:void(0)" class="dropdown-item" data-status="away"><span class="status-circle away me-2"></span> Away</a>
                  <a href="javascript:void(0)" class="dropdown-item" data-status="busy"><span class="status-circle busy me-2"></span> Busy</a>
                  <a href="javascript:void(0)" class="dropdown-item" data-status="offline"><span class="status-circle offline me-2"></span> Offline</a>
               </div>
            </div>
            <div class="clearfix">
               <h5 class="mb-0 fw-semibold fs-13 text-white">Mike Rose</h5>
            </div>
            <div class="actions ms-auto">
               <a class="btn-icon btn-icon-sm btn-icon-soft-light text-white" href="javascript: void(0);" id="minimize-chat">
                  <i class="bx bx-minus fs-sm"></i>
               </a>
               <a class="btn-icon btn-icon-sm btn-icon-soft-light text-white" href="javascript: void(0);" id="close-chat">
                  <i class="bx bx-x fs-sm"></i>
               </a>
            </div>
         </div>
         <div class="chat-conversation p-2">
            <ul class="chat-conversation-list" id="chat-conversation-scrollbar" tabindex="-1">
               <li class="text-center"><span class="badge badge-light-primary">Today</span></li>
               <li class="clearfix even">
                  <div class="chat-avatar">
                     <img alt="male" src="public/dist/data/images/users/avatar-2.jpg">
                     <small>10:00</small>
                  </div>
                  <div class="conversation-text">
                     <div class="ctext-wrap">
                        <div class="fw-semibold">Johnny</div>
                        <p> Hello! </p>
                     </div>
                  </div>
               </li>
               <li class="clearfix odd">
                  <div class="chat-avatar"><img alt="male" src="public/dist/data/images/users/avatar-6.jpg"><small>10:01</small>
                  </div>
                  <div class="conversation-text">
                     <div class="ctext-wrap">
                        <div class="fw-semibold">Dennis</div>
                        <p> Hi, How are you? What about our next meeting? </p>
                     </div>
                  </div>
               </li>
               <li class="clearfix">
                  <div class="chat-avatar"><img alt="male" src="public/dist/data/images/users/avatar-6.jpg"><small>10:01</small>
                  </div>
                  <div class="conversation-text">
                     <div class="ctext-wrap">
                        <div class="fw-semibold">Johnny</div>
                        <p> Yeah everything is fine </p>
                     </div>
                  </div>
               </li>
               <li class="clearfix odd">
                  <div class="chat-avatar"><img alt="male" src="public/dist/data/images/users/avatar-6.jpg"><small>10:01</small>
                  </div>
                  <div class="conversation-text">
                     <div class="ctext-wrap">
                        <div class="fw-semibold">Dennis</div>
                        <p> Wow that's great... </p>
                     </div>
                  </div>
               </li>
            </ul>
            <div class="position-relative chat-input">
               <input type="text" class="form-control" placeholder="Type your message...">
               <div class="chat-link">
                  <a href="javascript: void(0);" class="p-1"><i class="bx bxs-file-image fs-sm"></i></a>
                  <a href="javascript: void(0);" class="p-1"><i class="bx bxs-send fs-sm"></i></a>
               </div>
            </div>
         </div>
      </div><!-- chat box End -->
      <!-- main content End -->
      <!-- footer -->
      <!-- footer -->
      <div class="preloader">
         <div class="status">
            <div class="spinner-border avatar-sm text-primary m-2" role="status"></div>
         </div>
      </div>

      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6 mb-1 mb-md-0">
               <span><span id="date">2022</span> &copy; VPĐU </span>
            </div>
            <div class="col-md-6 text-md-end">
               <span class="text-primary font-weight-700">Văn phòng Đảng ủy Trường</span>
            </div>
         </div>
      </div>


   </div>
   <!-- Page End -->
   <!-- ================== BEGIN BASE JS ================== -->
   <script src="public/dist/data/js/vendor.min.js"></script>
   <!-- ================== END BASE JS ================== -->

   <!-- ================== BEGIN PAGE LEVEL JS ================== -->
   <script src="public/dist/data/libs/flatpicker/js/flatpickr.js"></script>
   <script src="public/dist/data/libs/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
   <script src="public/dist/data/libs/ckeditor4/ckeditor.js"></script>
   <script src="public/dist/data/libs/form-mask/js/jquery.mask.min.js"></script>
   <script src="public/dist/data/libs/select2/js/select2.min.js"></script>
   <script src="public/dist/data/libs/jquery-validation/js/jquery.validate.min.js"></script>
   <script src="public/dist/data/libs/jquery-validation/js/additional-methods.min.js"></script>
   <!-- ================== END PAGE LEVEL JS ================== -->
   <!-- ================== BEGIN PAGE JS ================== -->
   <script src="public/dist/data/libs/dragula/dragula.min.js"></script>
   <script src="public/dist/data/js/pages/dragula.init.js"></script>
   <script src="public/dist/data/js/pages/member-profile.init.js"></script>
   <script src="public/dist/data/js/app.js"></script>
   <!-- ================== END PAGE JS ================== -->
</body>

</html>