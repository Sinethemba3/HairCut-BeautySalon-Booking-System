<?php $this->view('includes/admin_header'); ?>
<!-- header & mobile header -->

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- header & mobile header -->
        <?php $this->view('includes/headers'); ?>
            <!-- Begin Page Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="text-dark">Terms and Conditions</h3>
                                    <hr>
                                    <p class="text-dark">You are about to delete this salon. <br> Do this when you:</p>
                                    <li class="text-dark">Do not want this salon, </li>
                                    <li class="text-dark">This salon is no longer part of this store, or</li>
                                    <li class="text-dark">This salon is no longer permitable to be in this system.</li>
                                    <br>
                                    <p class="text-dark">Do you really want to delete this salon?</p>
                                    <hr>
                                    <?php if ($row): ?>
                                        <form method="POST">
                                            <input type="hidden" name="id">
                                            <input class="btn btn-sm btn-danger col-md-2 text-white" type="submit" value="Yes, delete salon">&nbsp;
                                            <a href="<?=ROOT?>/openingHours">
                                                <input class="btn btn-sm btn-warning text-white col-md-2" type="button" value="No">
                                            </a>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.container-fluid -->

<!-- footer & mobile footer -->
<?php $this->view('includes/admin_footer'); ?>
<!-- footer & mobile footer -->
