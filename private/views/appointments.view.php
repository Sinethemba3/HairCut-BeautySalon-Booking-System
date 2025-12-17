<?php $this->view('includes/admin_header'); ?>
<!-- header & mobile header -->

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

                <!-- header & mobile header -->
                <?php $this->view('includes/headers'); ?>
                <!-- header & mobile header -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Appointments</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="font-size: 0.8rem;">App. Number</th>
                                            <th style="font-size: 0.8rem;">Service</th>
                                            <th style="font-size: 0.8rem;">Amount</th>
                                            <th style="font-size: 0.8rem;">50% Paid Deposit</th>
                                            <th style="font-size: 0.8rem;">Status</th>
                                            <th style="font-size: 0.8rem;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="font-size: 0.8rem;">App. Number</th>
                                            <th style="font-size: 0.8rem;">Service</th>
                                            <th style="font-size: 0.8rem;">Amount</th>
                                            <th style="font-size: 0.8rem;">50% Paid Deposit</th>
                                            <th style="font-size: 0.8rem;">Status</th>
                                            <th style="font-size: 0.8rem;">Action</th>
                                        </tr>
                                    </tfoot>
                                    
                                    <tbody>
                                        <?php 
                                            if (!empty($rows)):
                                                foreach ($rows as $row):
                                                    if ($row->name == null): 
                                                        // ✅ Do Something
                                                    else:
                                        ?>
                                            <tr>
                                                <td style="font-size: 0.8rem;"><?= '#' . esc($row->appointment_id) ?></td>

                                                <td style="font-size: 0.8rem;"><?= esc($row->services_) ?></td>

                                                <td style="font-size: 0.8rem;">
                                                    <?php
                                                        $amountsData  = $row->amount;
                                                        $amountsArray = explode(',', $amountsData);
                                                        $total        = 0;

                                                        foreach ($amountsArray as $amount) {
                                                            $trimmedAmount = trim($amount);
                                                            if (is_numeric($trimmedAmount)) {
                                                                $total += (float) $trimmedAmount;
                                                            }
                                                        }

                                                        // ✅ RULE APPLIED HERE
                                                        if (strtolower($row->status) === 'pending') {
                                                            $displayAmount = $total / 2;
                                                        } elseif (
                                                            strtolower($row->status) === 'appointment attended' ||
                                                            strtolower($row->status) === 'attended'
                                                        ) {
                                                            $displayAmount = $total;
                                                        } else {
                                                            $displayAmount = 0; // safe fallback
                                                        }

                                                        echo 'R' . number_format($displayAmount, 2);
                                                    ?>
                                                </td>

                                                <td style="font-size: 0.8rem;">
                                                    <?php
                                                        switch ((int)$row->paid) {
                                                            case 0:
                                                                $statuses = '<span class="badge badge-danger"><i class="mdi mdi-cancel"></i> Not Paid</span>';
                                                                break;
                                                            case 1:
                                                                $statuses = '<span class="badge badge-success"><i class="fa fa-check"></i> Paid</span>';
                                                                break;
                                                            default:
                                                                $statuses = '<span class="badge badge-danger"><i class="mdi mdi-cancel"></i> Payment Failed</span>';
                                                                break;
                                                        }
                                                        echo $statuses;
                                                    ?>
                                                </td>

                                                <td style="font-size: 0.8rem;">
                                                    <?php
                                                        switch ($row->status) {
                                                            case 'Pending':
                                                                echo '<span class="text-warning"><i>' . $row->status . '</i> <i class="fa fa-spinner fa-spin text-warning"></i></span>';
                                                                break;
                                                            case 'Accepted':
                                                                echo '<span class="text-success"><i>' . $row->status . '</i> <i class="fa fa-check text-success"></i></span>';
                                                                break;
                                                            case 'Rejected':
                                                                echo '<span class="text-danger"><i>' . $row->status . '</i> <i class="fa fa-times text-danger"></i></span>';
                                                                break;
                                                            case 'Waiting-List':
                                                                echo '<span class="text-info"><i>' . ucwords(str_replace('-', ' ', $row->status)) . '</i> <i class="fa fa-spinner fa-spin text-info"></i></span>';
                                                                break;
                                                            case 'Attended':
                                                                echo '<span class="text-danger"><i><s>' . $row->status . '</s></i> <i class="fa fa-check-double text-danger"></i></span>';
                                                                break;
                                                            default:
                                                                echo '<span><i class="fa fa-spinner fa-spin text-danger"></i></span>';
                                                        }
                                                    ?>
                                                </td>

                                                <td class="font-w300" style="font-size: 0.8rem;">
                                                    <a href="<?= ROOT ?>/appointments/edit/<?= $row->id ?>" class="action-icon"><i class="fa fa-eye"></i></a> | 
                                                    <a href="<?= ROOT ?>/appointments/delete/<?= $row->id ?>" class="action-icon"><i class="fa fa-trash-alt text-danger"></i></a>
                                                </td>
                                            </tr>
                                        <?php 
                                                    endif;
                                                endforeach;
                                            endif;
                                        ?>
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
            
