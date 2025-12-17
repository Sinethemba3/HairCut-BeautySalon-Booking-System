<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=APP_NAME ?> | <?=APP_DESC ?></title>

    <!-- ::::::::::::::Favicon icon:::::::::::::: -->
    <link rel="shortcut icon" href="<?=ROOT?>/assets/images/logo/logo_design.png" type="image/png">

    <!-- Custom fonts for this template -->
    <link href="<?=ROOT?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=ROOT?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?=ROOT?>/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=ROOT?>/assets/mdi/css/materialdesignicons.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

                <!-- header & mobile header -->
                <?php $this->view('includes/headers'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Services</h6>
                            <?php if (Auth::access('Admin')) : ?>
                                <div class="float-right">
                                    <a href="<?=ROOT?>/single_service/staffsadd/<?=$row->service_id?>?tab=select=true">
                                        <button class="btn btn-md btn-info"><i class="mdi mdi-plus">Add new</button></i>
                                    </a>
                                    <a href="<?=ROOT?>/single_service/staffsremove/<?=$row->service_id?>?tab=select=true">
                                        <button class="btn btn-md btn-danger"><i class="mdi mdi-minus">Remove</button></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-12">
                            <div class="card-body">
                                <?php
                                    switch ($page_tab) {
                                        case 'staffs':
                                            # code...
                                                include(views_path('class-tab-staffs'));
                                            break;

                                            case 'staffs-add':
                                                # code...
                                                    include(views_path('class-tab-staffs-add'));
                                                break;

                                            case 'staffs-remove':
                                                # code...
                                                    include(views_path('class-tab-staffs-remove'));
                                                break;
                                        
                                        default:
                                            # code...
                                            break;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- header & mobile header -->
    <?php $this->view('includes/modal'); ?>
    <!-- header & mobile header -->
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?=ROOT?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=ROOT?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=ROOT?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=ROOT?>/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=ROOT?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=ROOT?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=ROOT?>/assets/js/demo/datatables-demo.js"></script>
</body>
</html>
