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
                        <form onsubmit="validate(event, this)" method="post" enctype="multipart/form-data" class="add_product_1 form-font-sm">
                            <h3 class="fw-400 text-center pb-2 pb-4"> 
                                Add Salon Service <i class="fa fa-cogs text-info rounded-circle"></i>
                            </h3>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Category <span style="color: red">*</span></label>
                                    <select name="service" id="service" class="line-input form-control form-control-sm custom-select" required>
                                        <option value="" disabled selected>-- Category --</option>

                                        <!-- Barber core -->
                                        <option value="Haircuts">Haircuts</option>
                                        <option value="Fades">Fades</option>
                                        <option value="Line-up / Shape-up">Line-up / Shape-up</option>
                                        <option value="Beard Services">Beard Services</option>
                                        <option value="Shaves">Shaves</option>
                                        <option value="Hair & Beard Combo">Hair & Beard Combo</option>
                                        <option value="Designs / Patterns">Designs / Patterns</option>
                                        <option value="Hair Treatment">Hair Treatment</option>

                                        <!-- Existing salon categories (keep if mixed salon + barber) -->
                                        <option value="Hairdressing">Hairdressing</option>
                                        <option value="Wig Bar">Wig Bar</option>
                                        <option value="Plaits & Braids">Plaits & Braids</option>
                                        <option value="Nails">Nails</option>
                                        <option value="Face & Body">Face & Body</option>
                                        <option value="Packages">Packages</option>

                                        <!-- Age-based -->
                                        <option value="Kiddies">Kiddies</option>
                                        <option value="Elderly">Elderly</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Description <span style="color: red">*</span></label>
                                    <select name="name" id="name" class="line-input form-control form-control-sm custom-select" required>
                                        <option value="" disabled selected>-- Description --</option>

                                        <!-- Barber Descriptions -->
                                        <option value="Low Fade">Low Fade</option>
                                        <option value="High Fade">High Fade</option>
                                        <option value="Mid Fade">Mid Fade</option>
                                        <option value="Buzz Cut">Buzz Cut</option>
                                        <option value="Skin Fade">Skin Fade</option>
                                        <option value="Line Up">Line Up</option>
                                        <option value="Beard Trim">Beard Trim</option>
                                        <option value="Shave">Shave</option>

                                        <!-- Male Grooming -->
                                        <option value="Hair Cut & Beard">Hair Cut & Beard</option>
                                        <option value="Male Facial">Male Facial</option>
                                        <option value="Grooming Package">Grooming Package</option>

                                        <!-- Hairdressing & Wig Bar -->
                                        <option value="Hair Cut">Hair Cut</option>
                                        <option value="Hair Styling">Hair Styling</option>
                                        <option value="Hair Treatment">Hair Treatment</option>
                                        <option value="Installation">Installation</option>
                                        <option value="Wig Treatment">Wig Treatment</option>
                                        <option value="Wig Colouring">Wig Colouring</option>

                                        <!-- Plaits & Braids -->
                                        <option value="Natural Plaits">Natural Plaits</option>
                                        <option value="Braids with Extensions">Braids with Extensions</option>
                                        <option value="Kiddies Braids">Kiddies Braids</option>

                                        <!-- Nails -->
                                        <option value="Gel Nails">Gel Nails</option>
                                        <option value="Ladies Manicure">Ladies Manicure</option>
                                        <option value="Ladies Pedicure">Ladies Pedicure</option>
                                        <option value="Express Hands & Feet">Express Hands & Feet</option>

                                        <!-- Face & Body -->
                                        <option value="Facial Therapy">Facial Therapy</option>
                                        <option value="Body Therapy">Body Therapy</option>
                                        <option value="Waxing">Waxing</option>
                                        <option value="Threading">Threading</option>

                                        <!-- Packages -->
                                        <option value="Birthday Package">Birthday Package</option>
                                        <option value="Couples Package">Couples Package</option>
                                        <option value="Corporate Package">Corporate Package</option>

                                        <!-- Kids & Elderly -->
                                        <option value="Kiddies Hair Cut">Kiddies Hair Cut</option>
                                        <option value="Elderly Hair Cut">Elderly Hair Cut</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Service name <span style="color: red">*</span></label>
                                    <input type="text" name="service_name" class="line-input form-control" placeholder="Service name" required>
                                </div>
                            </div>

                            <div class="row">
                                <!-- <div class="form-group col-md-4">
                                    <label>Size (Optional)</label>
                                    <select name="small" id="small" class="line-input form-control form-control-sm custom-select">
                                        <option value="" disabled selected>-- Select size --</option>
                                        <option value="Small">Small</option>
                                    </select>
                                </div> -->

                                <div class="form-group col-md-4">
                                    <label>Price <span style="color: red">*</span></label>
                                    <input value="<?=get_var('price1','0')?>" type="number" name="price1[]" class="line-input form-control" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Main Service <span style="color: red">*</span></label>
                                    <select name="main_service" class="line-input form-control form-control-sm custom-select" required>
                                        <option value="" disabled selected>-- Choose Main Service --</option>
                                        <?php foreach ($services as $srv): ?>
                                            <option value="<?= esc($srv->services) ?>"><?= esc($srv->services) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- <div class="form-group col-md-4">
                                    <label>Size 3: (Optional)</label>
                                    <select name="large" id="large" class="line-input form-control form-control-sm custom-select">
                                        <option value="" disabled selected>-- Select size --</option>
                                        <option value="Large">Large</option>
                                    </select>
                                </div> -->

                                <!-- <div class="form-group col-md-4">
                                    <label>Size 2: (Optional)</label>
                                    <select name="medium" id="medium" class="line-input form-control form-control-sm custom-select">
                                        <option value="" disabled selected>-- Select size --</option>
                                        <option value="Medium">Medium</option>
                                    </select>
                                </div> -->
                            </div>

                            <div class="row">
                                <!-- <div class="form-group col-md-4">
                                    <label>Price number 2: (Optional)</label>
                                    <input value="</?=get_var('price1','0')?>" type="number" name="price1[]" class="line-input form-control">
                                </div> -->

                                <!-- <div class="form-group col-md-4">
                                    <label>Price number 3: (Optional)</label>
                                    <input value="</?=get_var('price1','0')?>" type="number" name="price1[]" class="line-input form-control">
                                </div> -->

                                <?php if (!empty($services)): ?>
                                    <input type="hidden" name="service_id" value="<?= esc($services[0]->service_id) ?>" />
                                <?php endif; ?>
                            </div>

                            <div class="pb-4 pt-2">
                                <a href="<?=ROOT?>/salon_services">
                                    <button type="button" class="btn btn-md btn-secondary">Cancel</button>
                                </a>
                                <button type="submit" class="btn btn-md btn-primary">Create</button>
                            </div>
                        </form>
                    </div> 
                </div> 
            </div>   
            <!-- /.container-fluid -->
        </div>

<!-- footer & mobile footer -->
<?php $this->view('includes/admin_footer'); ?>
<!-- footer & mobile footer -->
