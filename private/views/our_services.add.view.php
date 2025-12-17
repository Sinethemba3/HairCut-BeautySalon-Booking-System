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
                    <div class="container col-md">
                        <form onsubmit="validate(event, this)" method="post" enctype="multipart/form-data" class="add_product_1" >
                            <h3 class="fw-400 text-center pb-2"> 
                                Add Product <i class=" fa fa-shopping-basket text-info rounded-circle"></i>
                            </h3>
                            <?php if(!empty($errors)) : ?>
                                <div class="col-md alert alert-warning text-center alert-dismissible fade show m-3 p-1 msg">
                                    <strong>Error - </strong> Please fix the errors below!!
                                </div>
                            <?php endif; ?>

                            <div class="text-center" >
                                <label>
                                    <img src="<?=ROOT?>/assets/images/product.jpg" class="col-md-12 img-fluid shadow-lg p-3 mb-5 bg-body rounded-circle" style="cursor: pointer; width: 110px; height: 100px;" >
                                    <input style="display: none;" onchange="display_image(this, this.files[0])" type="file" name="image"  class="add_product_6">
                                    <script>
                                        
                                        function display_image(element, file)
                                        {
                                            let allowed = ['jpeg','jpg','png','webp','gif'];
                                            let ext = file.name.split(".").pop();

                                            if(allowed.includes(ext.toLowerCase()))
                                            {
                                                let img = element.parentNode.querySelector("img");
                                                img.src = URL.createObjectURL(file);

                                                image_added = true;
                                            }else{

                                                alert("Only image of this type allowed: "+ allowed.toString());
                                                image_added = false;
                                            }
                                        }

                                    </script>
                                </label>
                                <?php if(!empty($errors['image'])):?>
                                    <div style="color: red;"><?=$errors['image']?></div>
                                <?php endif;?>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="" style="font-size: 0.8rem;">Service Name:</label>
                                    <?php if(!empty($errors['services'])):?>
                                        <div style="color: red;"><?=$errors['services']?></div>
                                    <?php endif;?>
                                    <input style="font-size: 0.8rem;" value="<?=get_var('services')?>" placeholder="" type="text" name="services" class="line-input form-control" >
                                </div>
                            </div>

                            <div class="pb-4 pt-2">
                                <a href="<?=ROOT?>/our_services">
                                    <button type="button" class="btn btn-md btn-secondary"  >Cancel</button>
                                </a>
                                <button type="submit" class="btn btn-md btn-primary"  >Create</button>
                            </div>
                        </form>
                
                        <script>
                            
                            var image_added = false;

                            function validate(e,form)
                            {
                                e.preventDefault();

                                if(!image_added){
                                    alert("please add a valid image");
                                    return;
                                }

                                form.submit();
                            }

                        </script>
                    </div> 
                </div> 
            </div>   
            <!-- /.container-fluid -->
        </div>

<!-- footer & mobile footer -->
<?php $this->view('includes/admin_footer'); ?>
<!-- footer & mobile footer -->
