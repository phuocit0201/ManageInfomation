<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <base href="<?= base ?>">
   <!-- ================== BEGIN PAGE LEVEL CSS START ================== -->
   <link rel="stylesheet" href="public/dist/data/asset/owl.carousel.min.css" />
   <!-- ================== BEGIN PAGE LEVEL END ================== -->
   <!-- ================== Plugins CSS  ================== -->
   <link rel="stylesheet" href="public/dist/data/asset/owl.carousel.min.css" />
   <!-- ================== Plugins CSS end ================== -->
   <!-- ================== BEGIN APP CSS  ================== -->
   <link rel="stylesheet" href="public/dist/data/asset/bootstrap.min.css" />
   <link rel="stylesheet" href="public/dist/data/asset/styles.min.css">
   <link rel="stylesheet" href="public/dist/data/libs/wave-effect/css/waves.min.css">
   <link rel="stylesheet" href="public/dist/data/libs/owl-carousel/css/owl.carousel.min.css">

   <link href="public/dist/data/libs/datatables/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
   <link href="public/dist/data/libs/datatables/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
   <link href="public/dist/data/libs/datatables/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

   <link rel="stylesheet" href="public/dist/data/css/bootstrap.min.css">
   <link rel="stylesheet" href="public/dist/data/css/styles.min.css">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
   <link rel="stylesheet" href="path/to/your/bootstrap/css/bootstrap.min.css">
</head>

<body>

   <div class="page-wrapper">
      <div class="page-title-box">
      </div>
      <!-- page content -->
      <div class="page-content-wrapper mt--45">
         <div class="container-fluid">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-12 col-md-6">
                        <div id="inputSearch1" class="dataTables_filter">
                           <label class="search-box d-inline-flex position-relative">
                              Search:
                              <!-- <input type="search" id="inputSearch" class="form-control form-control-sm" placeholder="Search..." aria-controls="view_contact_list" oninput="timKiem()" onkeypress="checkEnter(event)"> -->
                              <input type="search" id="inputSearch" class="form-control form-control-sm" placeholder="Search..." aria-controls="view_contact_list" onkeypress="checkEnter(event)">
                           </label>
                        </div>
                        <div id="ketQua"></div>
                     </div>
                     <table class="table table-centered dt-responsive nowrap w-100" id="view_contact_list">
                        <thead class="table-light">
                           <tr>
                              <th>HÌNH</th>
                              <th>CHI BỘ</th>
                              <th>HỌ VÀ TÊN</th>
                              <th>MSCBVC/MSSV</th>
                              <th>SĐT</th>
                              <th>NGÀY SINH</th>
                              <th>TRẠNG THÁI</th>
                              <th>CHI TIẾT</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>

                              <td>
                                 <div class="avatar avatar-sm bg-primary text-white">
                                    <img src="public/asset/avacon3.png" alt="Avatar Image">
                                 </div>
                              </td>

                              <td>
                                 <a class="text-default">3</a>
                              </td>

                              <td>
                                 <a class="text-default">Phan Công Đức</a>
                              </td>

                              <td>
                                 <a class="text-default">026.012.01306</a>
                              </td>

                              <td>
                                 <a href="tel:0961159192" class="text-default">0961159192</a>
                              </td>

                              <td>
                                 <a class="text-default">15/11/1997</a>
                              </td>

                              <td>
                                 <div class="d-flex">
                                    <label class="badge badge-soft-primary me-2">Đang sinh hoạt</label>
                                 </div>
                              </td>

                              <td>
                                 <a href="javascript: void(0);" class="avatar avatar-xs bg-soft-primary text-primary me-2" data-effect="wave" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Message">
                                    <i class="mdi mdi-message-text"></i>
                                 </a>
                                 <a href="<?= route('admin.search_show')?>"S class="avatar avatar-xs bg-soft-info text-info" data-effect="wave" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Profile">
                                    <i class="mdi mdi-eye"></i>
                                 </a>
                              </td>

                           </tr>
                        </tbody>
                  </div>


                  <!-- ================== BEGIN BASE JS ================== -->
                  <script src="public/dist/data/assets/js/vendor.min.js"></script>
                  <!-- ================== END BASE JS ================== -->

                  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
                  <script src="public/dist/data/assets/libs/datatables/js/jquery.dataTables.min.js"></script>
                  <script src="public/dist/data/assets/libs/datatables/js/dataTables.bootstrap4.min.js"></script>
                  <script src="public/dist/data/assets/libs/datatables/js/dataTables.responsive.min.js"></script>
                  <script src="public/dist/data/assets/libs/datatables/js/responsive.bootstrap4.min.js"></script>

                  <script src="public/dist/data/assets/libs/datatables/js/dataTables.buttons.min.js"></script>
                  <script src="public/dist/data/assets/libs/datatables/js/buttons.bootstrap4.min.js"></script>
                  <script src="public/dist/data/assets/libs/datatables/js/buttons.html5.min.js"></script>
                  <script src="public/dist/data/assets/libs/datatables/js/buttons.flash.min.js"></script>
                  <script src="public/dist/data/assets/libs/datatables/js/buttons.print.min.js"></script>
                  <script src="public/dist/data/assets/libs/datatables/js/pdfmake.min.js"></script>
                  <script src="public/dist/data/assets/libs/datatables/js/jszip.min.js"></script>
                  <script src="public/dist/data/assets/libs/datatables/js/vfs_fonts.js"></script>

                  <script src="public/dist/data/assets/libs/datatables/js/dataTables.keyTable.min.js"></script>
                  <script src="public/dist/data/assets/libs/datatables/js/dataTables.select.min.js"></script>
                  <!-- ================== END PAGE LEVEL JS ================== -->
                  <!-- ================== BEGIN PAGE JS ================== -->
                  <script src="public/dist/data/assets/js/pages/invoicelist.init.js"></script>
                  <script src="public/dist/data/assets/js/app.js"></script>
                  <!-- ================== END PAGE JS ================== -->

                  <script>
                     function timKiem() {
                        // Lấy giá trị từ ô nhập liệu và mã hóa
                        // Chuỗi cần tìm
                        var profile = [];
                        var chuoiCanTim = document.getElementById("inputSearch").value;

                        // Tạo URL với tham số
                        var url = "https://script.google.com/macros/s/AKfycbz_eaCoeZ9quhugBa6E7JTZZaMs1MezP9XQyYLyJiyvnB-w3XS1WqJcugecmp0P98XF/exec?chuoiCanTim=" + encodeURIComponent(chuoiCanTim);

                        fetch(url)
                           .then(response => response.json())
                           .then(data => {
                              // Xử lý kết quả nhận được từ Google Apps Script
                              console.log("Kết quả từ Google Apps Script:", data);
                              displayResults(data);
                              // Ở đây, bạn có thể thực hiện các thao tác khác với dữ liệu nhận được
                           })
                           .catch(error => console.error("Lỗi khi gửi yêu cầu:", error));
                     }

                     function displayResults(ketQua) {
                        var table = document.getElementById("view_contact_list");
                        var tbody = table.getElementsByTagName("tbody")[0];

                        // Xóa dữ liệu cũ trong bảng
                        tbody.innerHTML = "";

                        if (ketQua.length > 0) {
                           // Lặp qua từng kết quả và thêm vào bảng
                           ketQua.forEach(data => {
                              var row = tbody.insertRow();
                              var cell1 = row.insertCell(0);
                              var cell2 = row.insertCell(1);
                              var cell3 = row.insertCell(2);
                              var cell4 = row.insertCell(3);
                              var cell5 = row.insertCell(4);
                              var cell6 = row.insertCell(5);
                              var cell7 = row.insertCell(6);
                              var cell8 = row.insertCell(7);

                              // Thiết lập dữ liệu cho từng ô
                              cell1.innerHTML = `<div class="avatar avatar-sm bg-primary text-white">
                                                                           <img src="public/asset/avacon3.png" alt="Avatar Image">
                                                                        </div>`;
                              cell2.textContent = data["CHI BỘ"];
                              cell3.textContent = data["HỌ VÀ TÊN"];
                              cell4.textContent = data["MSCB/MSSV"];
                              cell5.innerHTML = '<a href="' + data["SỐ ĐIỆN THOẠI"] + '" class="text-default">' + data["SỐ ĐIỆN THOẠI"] + '</a>';
                              cell6.textContent = data["N-T-N SINH"];
                              cell7.innerHTML = '<label class="badge badge-soft-primary me-2">' + data["TRẠNG THÁI"] + '</label>';
                              cell8.innerHTML = `<a href=""
                               class="avatar avatar-xs bg-soft-primary text-primary me-2" data-effect="wave" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Message">
                                                                           <i class="mdi mdi-message-text"></i> </a>
                              <a href="<?= route('admin.search_show') . '?data='?>${encodeURIComponent(JSON.stringify(data))}" class="submit-profile avatar avatar-xs bg-soft-info text-info" data-effect="wave" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Profile">
                              <i class="mdi mdi-eye"></i> </a>`;
                              console.log(data)
                           });
                        } else {
                           // Hiển thị thông báo khi không có kết quả
                           var ketQuaElement = document.getElementById("ketQuaElement");
                           ketQuaElement.textContent = "Không có kết quả phù hợp.";
                        }
                     }

                     // Hàm thực hiện action khi được nhấn vào nút trong bảng
                     function performAction(id) {
                        // Thực hiện action dựa trên ID hoặc thông tin khác
                        console.log("Performing action for ID: " + id);
                     }


                     function checkEnter(event) {
                        if (event.key === "Enter") {
                           timKiem();
                           return
                        }

                     }


                     document.querySelector('submit-profile').addEventListener('click', function(event) {
                     // Ngăn chặn hành vi mặc định của thẻ <a> (chuyển đến route)
                     event.preventDefault();

                     // Lấy đường dẫn từ thẻ <a>
                     var linkHref = this.getAttribute('href');

                     // Chuyển đến route hoặc thực hiện các hành động khác tùy thuộc vào yêu cầu
                     window.location.href = linkHref;
                     });
                  </script>

                  <script src="path/to/your/jquery.min.js"></script>
                  <script src="path/to/your/bootstrap/js/bootstrap.bundle.min.js"></script>
                  <script>
                     $(document).ready(function() {
                        $('[data-bs-toggle="tooltip"]').tooltip();
                     });
                  </script>

</body>

</html>