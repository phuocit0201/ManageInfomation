<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $this->title ?></title>
    <base href="<?= base ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="public/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="public/vendors/nprogress/nprogress.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="public/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="public/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="public/build/css/loading.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="public/plugins/dropzone/min/dropzone.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?=route('admin.dashboard')?>" class="nav-link">Trang Chủ</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?=route('admin.dashboard')?>" class="brand-link">
                <img src="public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Quản Trị Viên</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="javascript:void(0)" class="d-block"><?= \Helpers\Auth::user('auth-admin')['full_name'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= route('admin.dashboard') ?>" class="nav-link <?= (isRoute(route('admin.dashboard'))) ? 'active' : null ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Trung Tâm Điều Khiển
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= route('admin.profile_infomation') ?>" class="nav-link <?= (isRoute(route('admin.profile_infomation')) || isRoute(route('admin.profile_infomation_show')) || isRoute(route('admin.profile_infomation_edit'))) ? 'active' : null ?>">
                                <i class="nav-icon fas fa-id-card-alt"></i>
                                <p>
                                    Quản Lí Hồ Sơ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= route('admin.profile_type') ?>" class="nav-link <?= (isRoute(route('admin.profile_type'))) ? 'active' : null ?>">
                                <i class="nav-icon fas fa-id-card-alt"></i>
                                <p>
                                    Quản Lí Loại Hồ Sơ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= route('admin.receive_persons') ?>" class="nav-link <?= (isRoute(route('admin.receive_persons'))) ? 'active' : null ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Quản Lí Người Tiếp Nhận
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= route('admin.contact_methods') ?>" class="nav-link <?= (isRoute(route('admin.contact_methods'))) ? 'active' : null ?>">
                                <i class="nav-icon fas fa-headset"></i>
                                <p>
                                    Quản Lí PT Liên Hệ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= route('admin.organizations') ?>" class="nav-link <?= (isRoute(route('admin.organizations'))) ? 'active' : null ?>">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    Quản Lí Đơn Vị
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= route('admin.branches') ?>" class="nav-link <?= (isRoute(route('admin.branches'))) ? 'active' : null ?>">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    Quản Lí Chi Bộ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= route('admin.change_password') ?>" class="nav-link <?= (isRoute(route('admin.change_password'))) ? 'active' : null ?>">
                                <i class="nav-icon fas fa-key"></i>
                                <p>
                                    Đổi Mật Khẩu
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base . 'admin/logout' ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Đăng Xuất
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark" id="card-title"><?= $data['card_title'] ?></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <?php
            require_once "./views/" . $data["page"] . ".php";
            ?>
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        <div class="hidden">
            <?php
            if (isset($_SESSION['notification'])) { ?>
                <span id="messager"><?= $_SESSION['notification']['messager'] ?></span>
                <span id="type-mess"><?= $_SESSION['notification']['type'] ?></span>
            <?php
                unset($_SESSION['notification']);
            } ?>
            <span></span>
        </div>
    </div>
   
    <div class="dialog" id="loading__js">
        <img src="public/build/images/loading.svg" alt="">
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="public/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="public/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="public/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="public/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="public/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="public/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="public/plugins/moment/moment.min.js"></script>
    <script src="public/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="public/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="public/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="public/dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="public/plugins/jszip/jszip.min.js"></script>
    <script src="public/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="public/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="public/plugins/chart.js/Chart.min.js"></script>

    <!-- dropzonejs -->
    <script src="public/plugins/dropzone/min/dropzone.min.js"></script>
    <script src="public/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script>
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        $(document).ready(function() {
            let messager = $('#messager').text();
            let typeMess = $('#type-mess').text();
            if (messager.length > 0) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: typeMess,
                    title: messager
                })
            }
        })

        $(document).on('click', '#delete-item-btn', function() {
            Swal.fire({
                title: '<?= BOX_DELETE['title'] ?>',
                text: "<?= BOX_DELETE['content'] ?>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<?= BOX_DELETE['confirm'] ?>',
                cancelButtonText: '<?= BOX_DELETE['cancel'] ?>'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('form').submit();
                }
            })
        });
    </script>
</body>

</html>