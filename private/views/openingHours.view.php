<!DOCTYPE html>
<?php $this->view('includes/admin_header'); ?>
<!-- header & mobile header -->

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
                            <a href="<?=ROOT?>/openingHours/add">
                                <button class="btn btn-sm btn-info float-right">Add Opening Hours</button>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size: 0.8rem;">
                                            <th>Public Holidays</th>
                                            <th>Working Days</th>
                                            <th>Sundays</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr style="font-size: 0.8rem;">
                                            <th>Public Holidays</th>
                                            <th>Working Days</th>
                                            <th>Sundays</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if (!empty($rows)): ?>
                                            <?php foreach ($rows as $row): ?>
                                                <tr style="font-size: 0.8rem;">
                                                    <td> <?=$row->public_holidays_time?></td>
                                                    <td> <?=$row->mondays_sundays_time?> </td>
                                                    <td> <?=$row->sundays_time?> </td>
                                                    <td> <?= get_date($row->date) ?> </td>

                                                    <td class="font-w200">
                                                        <a href="<?=ROOT?>/openingHours/edit/<?=$row->id?>" title="Click to edit"><i class="fa fa-edit" aria-hidden="true"></i></a> |
                                                        <a href="<?=ROOT?>/openingHours/delete/<?=$row->id?>" title="Block this User"><i class="mdi mdi-delete"style="color: #f05050"  aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            
<!-- footer & mobile footer -->
<?php $this->view('includes/admin_footer'); ?>
<!-- footer & mobile footer -->
