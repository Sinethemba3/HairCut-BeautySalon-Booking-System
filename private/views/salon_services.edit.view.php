<?php $this->view('includes/admin_header'); ?>
<!-- header & mobile header -->
 <style>
    .form-font-sm label,
    .form-font-sm select,
    .form-font-sm input,
    .form-font-sm button {
        font-size: 0.8rem !important;
    }
 </style>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- header & mobile header -->
        <?php $this->view('includes/headers'); ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="card col-md-12 shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="container col-md">
                    <h3>Edit Salon Services</h3>
                    <br>
                    <?php if (!empty($row)): ?>
                        <form method="post" class="add_product_1" >
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="" style="font-size: 0.8rem;"> Name:</label>
                                    <?php if(!empty($errors['salon'])):?>
                                        <div style="color: red;"><?=$errors['salon']?></div>
                                    <?php endif;?>

                                    <input value="<?=get_var('salon', $row[0]->name)?>" placeholder="Edit Salon" type="text" name="salon" class="line-input form-control" style="font-size: 0.8rem;">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=""  style="font-size: 0.8rem;">Service:</label>
                                    <?php if(!empty($errors['salon'])):?>
                                        <div style="color: red;"><?=$errors['salon']?></div>
                                    <?php endif;?>

                                    <input value="<?=get_var('salon', $row[0]->service)?>" placeholder="Edit Salon" type="text" name="salon" class="line-input form-control" style="font-size: 0.8rem;">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=""  style="font-size: 0.8rem;">Service Name:</label>
                                    <?php if(!empty($errors['salon'])):?>
                                        <div style="color: red;"><?=$errors['salon']?></div>
                                    <?php endif;?>
    
                                    <input value="<?=get_var('salon', $row[0]->service_name)?>" placeholder="Edit Salon" type="text" name="salon" class="line-input form-control" style="font-size: 0.8rem;">
                                </div>

                                <div class="form-group col-md-4">
                                    <?php
                                        $amountsData = $row[0]->price1; // Example data: "1.00,2.00,3.00"
                                        $amountsArray = explode(',', $amountsData);
                                        $total = 0;

                                        // Calculate total
                                        foreach ($amountsArray as $amount) {
                                            $trimmedAmount = trim($amount);
                                            if (is_numeric($trimmedAmount)) {
                                                $total += floatval($trimmedAmount);
                                            }
                                        }

                                        // Calculate final price
                                        $finalPrice = $total * 1.14;
                                    ?>
                                    <label class=""  style="font-size: 0.8rem;">Amount:</label>
                                    <?php if(!empty($errors['amount'])):?>
                                        <div style="color: red;"><?=$errors['amount']?></div>
                                    <?php endif;?>
    
                                    <input value="<?= get_var('salon', 'R' . number_format($finalPrice, 2))?>" placeholder="Edit Salon" type="text" name="salon" class="line-input form-control" style="font-size: 0.8rem;">
                                </div>
                                <td>            
                            </div>

                            <div class="pb-4 pt-2">
                                <a href="<?=ROOT?>/salon_services">
                                    <button type="button" class="btn btn-md btn-secondary"  style="font-size: 0.8rem;">Cancel</button>
                                </a>
                                <button type="submit" class="btn btn-md btn-primary" style="font-size: 0.8rem;" >Update</button>
                            </div>
                        </form>
                        <?php endif; ?>
                    </div> 
                </div> 
            </div>   
            <!-- /.container-fluid -->
        </div>

<!-- footer & mobile footer -->
<?php $this->view('includes/admin_footer'); ?>
<!-- footer & mobile footer -->
