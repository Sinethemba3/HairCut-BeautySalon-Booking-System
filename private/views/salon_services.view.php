<?php $this->view('includes/admin_header'); ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <?php $this->view('includes/headers'); ?>

        <!-- Main Content -->
        <div class="container-fluid">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Salon Services</h6>
                    <a href="<?= ROOT ?>/salon_services/add" class="btn btn-sm btn-info">Add Salon Service</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-sm">
                                <tr style="font-size: 0.8rem;">
                                    <th>Category</th>
                                    <th>Service</th>
                                    <th>Description</th>
                                    <th>Sub-Service Name</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tfoot class="text-sm">
                                <tr style="font-size: 0.8rem;">
                                    <th>Category</th>
                                    <th>Service</th>
                                    <th>Description</th>
                                    <th>sub-Service Name</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>

                            <tbody class="text-sm">
                                <?php if (!empty($rows)): ?>
                                    <?php foreach ($rows as $row): ?>
                                        <tr style="font-size: 0.8rem;">
                                            <td><?= esc($row->service) ?></td>
                                            <td><?= esc($row->main_service ?? '') ?></td>
                                            <td><?= esc($row->name) ?></td>
                                            <td><?= esc($row->service_name) ?></td>
                                            <td>
                                                <?php
                                                    $amounts = explode(',', $row->price1);
                                                    $total = array_sum(array_filter($amounts, fn($a) => is_numeric(trim($a))));
                                                    $finalPrice = $total * 1.14;
                                                    echo 'R' . number_format($finalPrice, 2);
                                                ?>
                                            </td>
                                            <td><?= get_date($row->date) ?></td>
                                            <td>
                                                <a href="<?= ROOT ?>/salon_services/edit/<?= $row->id ?>" class="text-info mr-2"><i class="fa fa-eye"></i></a>
                                                <a href="<?= ROOT ?>/salon_services/delete/<?= $row->id ?>" class="text-danger"><i class="fa fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="7" class="text-center">No services found.</td></tr>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div> <!-- /.container-fluid -->

    </div> <!-- End of Main Wrapper -->

<?php $this->view('includes/admin_footer'); ?>
