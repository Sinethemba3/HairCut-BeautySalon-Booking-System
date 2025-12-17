<?php $this->view('includes/admin_header'); ?>
<!-- header & mobile header -->

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- header & mobile header -->
            <?php $this->view('includes/headers'); ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="card col-md-12 shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="container col-md pt-4">
                        <div class="row">
                            <?php if (!empty($row)): ?>
                                <div class="container table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <tr style="font-size: 0.8rem;">
                                            <th>Appointment Number</th>
                                            <td>#<?=esc($row[0]->appointment_id)?></td>
                                        </tr>

                                        <tr style="font-size: 0.8rem;">
                                            <th>Name</th>
                                            <td><?=esc($row[0]->name)?></td>
                                        </tr>

                                        <tr style="font-size: 0.8rem;">
                                            <th>Mobile Number</th>
                                            <td><?=esc($row[0]->phone)?></td>
                                        </tr>

                                        <tr style="font-size: 0.8rem;">
                                            <th>Service</th>
                                            <td><?=esc($row[0]->services_)?></td>
                                        </tr>

                                        <tr style="font-size: 0.8rem;">
                                            <th>Therapist</th>
                                            <td><?=esc($row[0]->name_)?>&nbsp;<?=esc($row[0]->surname_)?></td>
                                        </tr>

                                        <tr style="font-size: 0.8rem;">
                                            <th>Appointment Date</th>
                                            <td><?=get_date($row[0]->appointment_date)?></td>
                                        </tr>

                                        <tr style="font-size: 0.8rem;">
                                            <th>Appointment Time</th>
                                            <td><?=esc($row[0]->appointment_time)?></td>
                                        </tr>

                                        <tr style="font-size: 0.8rem;">
                                            <th>Total Amount</th>
                                            <td>
                                               <?php
                                                    $amountsData  = $row[0]->amount; // "1.00,2.00,3.00"
                                                    $amountsArray = explode(',', $amountsData);
                                                    $total        = 0;

                                                    foreach ($amountsArray as $amount) {
                                                        $trimmedAmount = trim($amount);
                                                        if (is_numeric($trimmedAmount)) {
                                                            $total += (float) $trimmedAmount;
                                                        }
                                                    }

                                                    // ✅ Status-based display logic
                                                    $status = strtolower($row[0]->status ?? '');

                                                    if ($status === 'pending') {
                                                        $displayAmount = $total / 2;
                                                    } elseif ($status === 'appointment attended' || $status === 'attended') {
                                                        $displayAmount = $total;
                                                    } else {
                                                        $displayAmount = 0;
                                                    }

                                                    echo 'R' . number_format($displayAmount, 2);
                                                ?>
                                            </td>
                                        </tr>

                                        <tr style="font-size: 0.8rem;">
                                            <th>50% Paid Deposit</th>
                                            <td>
                                                <?php
                                                    if (esc($row[0]->paid == 0)) {
                                                        $statuses = '<span class="badge badge-danger"><i class="mdi mdi-cancel"></i> Not Paid</span>';
                                                    }
                                                    elseif (esc($row[0]->paid == 1)) {
                                                        $statuses = '<span class="badge badge-success"><i class="fa fa-check"></i> Paid</span>';
                                                    }
                                                    else{
                                                        $statuses = '<span class="badge badge-danger"><i class="mdi mdi-cancel"></i> Payment Failed</span>';
                                                    }
                                                    echo ' '.$statuses.' ';
                                                ?>
                                            </td>
                                        </tr>

                                        <tr style="font-size: 0.8rem;">
                                            <th> Date</th>
                                            <td><?=get_date($row[0]->date)?></td>
                                        </tr>

                                        <tr style="font-size: 0.8rem;">
                                            <th>Status</th>
                                            <td> 
                                                <?php 
                                                    if ($row[0]->status == 'Pending') {
                                                        # code...
                                                        $tatus = '<span class="text-warning"><i> '.$row[0]->status.', '.$row[0]->remark.' </i><i class="fa fa-spinner fa-spin text-warning"></i></span>';
                                                    }
                                                    elseif ($row[0]->status == 'Accepted') {
                                                        # code...
                                                        $tatus = '<span class="text-success"><i> '.$row[0]->status.', '.$row[0]->remark.' </i><i class="fa fa fa-check text-success"></i></span>';
                                                    }
                                                    elseif ($row[0]->status == 'Rejected') {
                                                        # code...
                                                        $tatus = '<span class="text-danger"><i> '.$row[0]->status.', '.$row[0]->remark.' </i><i class="fa fa-times text-danger"></i></span>';
                                                    }
                                                    elseif ($row[0]->status == 'Waiting-List') {
                                                        # code...
                                                        $tatus = '<span class="text-info"><i> '.ucwords(str_replace("-", " ", $row[0]->status)).', '.$row[0]->remark.' </i><i class="fa fa-spinner fa-spin text-info"></i></span>';
                                                    }
                                                    elseif ($row[0]->status == 'Attended') {
                                                        # code...
                                                        $tatus = '<span class="text-danger"><i> <s>'.$row[0]->status.'</s> </i><i class="fa fa-check-double text-danger"></i></span>';
                                                    }
                                                    else {
                                                        # code...
                                                        $tatus = '<span><i class="fa fa-spinner fa-spin text-danger"></i></span>';
                                                    }

                                                    echo ' '.$tatus.' ';
                                                ?>
                                            </td>
                                        </tr>
                                    </table>

                                    <?php if($row[0]->remark == null || $row[0]->remark == 'Appointment recieved, we will confirm time in few minutes' || $row[0]->remark == 'Please Arrive exactly @ '.esc($row[0]->appointment_time).'' || $row[0]->remark == 'Please Arrive after 10 minutes past '.esc($row[0]->appointment_time).'' || $row[0]->remark == 'Please Arrive after 15 minutes past '.esc($row[0]->appointment_time).'' || $row[0]->remark == 'Please Arrive after 20 minutes past '.esc($row[0]->appointment_time).'' || $row[0]->remark == 'Please Arrive after 25 minutes past '.esc($row[0]->appointment_time).'' || $row[0]->remark == 'Please Arrive after 30 minutes past '.esc($row[0]->appointment_time).''): ?>

                                    <div class="container">
                                        <form name="update" method="post" enctype="multipart/form-data" >
                                            <div class="row mb-3">
                                                <label style="font-size: 0.8rem;">Remarks :</label>
                                                <select name="remark" id="remark" class="line-input form-control wd-450" onchange="random_function()" required="true" style="font-size: 0.8rem;">
                                                    <option value="" selected="true" disabled="">--Select Remark--</option>
                                                    <option value="Appointment recieved, we will confirm time in few minutes"> Appointment recieved, we will confirm time in few minutes</option>
                                                    <option value="Please Arrive exactly @ <?=esc($row[0]->appointment_time)?>"> Please Arrive exactly @ <?=esc($row[0]->appointment_time)?></option>
                                                    <option value="Please Arrive after 10 minutes past <?=esc($row[0]->appointment_time)?>"> Please Arrive after 10 minutes past <?=esc($row[0]->appointment_time)?></option>
                                                    <option value="Please Arrive after 15 minutes past <?=esc($row[0]->appointment_time)?>"> Please Arrive after 15 minutes past <?=esc($row[0]->appointment_time)?></option>
                                                    <option value="Please Arrive after 20 minutes past <?=esc($row[0]->appointment_time)?>"> Please Arrive after 20 minutes past <?=esc($row[0]->appointment_time)?></option>
                                                    <option value="Please Arrive after 25 minutes past <?=esc($row[0]->appointment_time)?>"> Please Arrive after 25 minutes past <?=esc($row[0]->appointment_time)?></option>
                                                    <option value="Please Arrive after 30 minutes past <?=esc($row[0]->appointment_time)?>"> Please Arrive after 30 minutes past <?=esc($row[0]->appointment_time)?></option>
                                                    <option value="Appointment Attended"> Appointment Attended</option>
                                                    <option value="Appointment Rejected"> Appointment Rejected</option>
                                                </select>
                                            </div>

                                            <div class="row mb-3">
                                                <label style="font-size: 0.8rem;">Status :</label>
                                                <select name="status" id="status" class="line-input form-control wd-450" onchange="random_function0()" required="true" style="font-size: 0.8rem;">
                                                    <option value="" selected="true" disabled="">--Select--</option>
                                                </select>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <a href="<?=ROOT?>/appointments">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                </a>
                                            </div>

                                            <!-- hidden values -->
                                            <input type="hidden" value="<?=$row[0]->appointment_time?>" name="appointment_time">
                                        
                                            <input type="hidden" value="<?=$row[0]->appointment_date?>" name="appointment_date">
                                        
                                            <input type="hidden" value="<?=$row[0]->services_?>" name="services_">
                    
                                            <input type="hidden" value="<?=$row[0]->name_?>" name="name_">

                                            <input type="hidden" value="<?=$row[0]->name?>" name="name">
                                            
                                            <input type="hidden" value="<?=esc($row[0]->email)?>" name="email">
                                            
                                            <input type="hidden" value="<?=esc($row[0]->appointment_id)?>" name="appointment_id">
                                            <!-- hidden values -->
                                        </form>
                                    </div>
                                    <?php else: ?>
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <tr style="font-size: 0.8rem;">
                                                <th>Remark</th>
                                                <td><?=$row[0]->remark; ?></td>
                                            </tr>
                                        </table>

                                        <div class="modal-footer">
                                            <a href="<?=ROOT?>/appointments">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <script>
            function random_function()
                {
                    var a = document.getElementById("remark").value;
                    
                    if(a === "Appointment recieved, we will confirm time in few minutes")
                    {
                        var arr = ["Waiting-List"];
                    }
                    else if(a === "Please Arrive exactly @ <?=esc($row[0]->appointment_time)?>" || a === "Please Arrive after 10 minutes past <?=esc($row[0]->appointment_time)?>" || a === "Please Arrive after 15 minutes past <?=esc($row[0]->appointment_time)?>" || a === "Please Arrive after 20 minutes past <?=esc($row[0]->appointment_time)?>" || a === "Please Arrive after 25 minutes past <?=esc($row[0]->appointment_time)?>" || a === "Please Arrive after 30 minutes past <?=esc($row[0]->appointment_time)?>")
                    {
                        var arr = ["Accepted"];
                    }
                    else if(a === "Appointment Attended")
                    {
                        var arr = ["Attended"];
                    }
                    else if(a === "Appointment Rejected")
                    {
                        var arr = ["Rejected"];
                    }
                    
                    var string = "";
                    
                    for(i = 0; i < arr.length; i ++)
                    {
                        string = string + "<option style='color: red;' value=" + arr[i] + ">" + arr[i] + "</option>";
                    }
                    document.getElementById("status").innerHTML = string;
                }
        </script>

<!-- footer & mobile footer -->
<?php $this->view('includes/admin_footer'); ?>
<!-- footer & mobile footer -->
