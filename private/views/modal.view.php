    <!-- ::::::::::::::Favicon icon:::::::::::::: -->
    <link rel="shortcut icon" href="<?=ROOT?>/assets/images/logo/logo_design.png" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/bootstrap4.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/custom.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/preload.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/mdi/css/materialdesignicons.min.css">
 
    <link href="<?=ROOT?>/assets/css/index.css" rel="stylesheet">
    <script src="<?=ROOT?>/assets/js/jquery-1.12.4.min.js"></script>
    <script src="<?=ROOT?>/assets/js/wb.conveyerbelt.min.js"></script>
    <script src="<?=ROOT?>/assets/js/jquery-ui.min.js"></script>
    <script src="<?=ROOT?>/assets/js/wb.slideshow.min.js"></script>
    
    <!-- Start Modal Add cart -->
    <div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <?php if (!empty($rows)): ?>
                            <?php foreach ($rows as $row): ?>
                                <?php if($row->service == 'Hairdressing' && $row->name == 'Mizani'){ ?>
                                    <div class="panel-default">
                                        <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                            <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                            <span><?=$row->service_name?></span>
                                        </label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="checkbox-default pb-4" for="amount_">
                                            <input type="checkbox" data-type="decimal" value="<?=$row->price1?>" name="amount" id="amount_">
                                            <span>R<?=number_format($row->price1, 2)?></span>
                                        </label>
                                    </div>
                                <?php } else { ?>
                                                            
                                <?php } ?>
                        
                            <?php endforeach;?>
                            <?php else: ?>
                            <div class="pb-4">
                                <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Add cart -->

    <!-- <script src="<?=ROOT?>/assets/js/vendor/vendor.min.js"></script> -->
    <script src="<?=ROOT?>/assets/js/plugins/plugins.min.js"></script>
    <script src="<?=ROOT?>/assets/js/bootstrap.min.js"></script>

    <!-- Main JS -->
    <script src="<?=ROOT?>/assets/js/main.js"></script>
    <script src="<?=ROOT?>/assets/js/preload.js"></script>
    