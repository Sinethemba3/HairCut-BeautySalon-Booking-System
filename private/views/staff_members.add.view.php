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
                                Add staff member Picture <i class=" fa fa-user text-info rounded-circle"></i>
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
                                    <label class=""  > Name:</label>
                                    <?php if(!empty($errors['name'])):?>
                                        <div style="color: red;"><?=$errors['name']?></div>
                                    <?php endif;?>
                                    <input value="<?=get_var('name')?>" placeholder="" type="text" name="name" class="form-control" >
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label class=""  >Surname: </label>
                                    <?php if(!empty($errors['surname'])):?>
                                        <div style="color: red;"><?=$errors['surname']?></div>
                                    <?php endif;?>
                                    <input value="<?=get_var('surname')?>" placeholder="" type="text" name="surname" class="form-control" value="0.00">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=""  > Email:</label>
                                    <?php if(!empty($errors['email'])):?>
                                        <div style="color: red;"><?=$errors['email']?></div>
                                    <?php endif;?>
                                    <input value="<?=get_var('email')?>" placeholder="" type="email" name="email" class="form-control" value="0.00">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class=""  >Gender: </label>
                                    <?php if(!empty($errors['gender'])):?>
                                        <div style="color: red;"><?=$errors['gender']?></div>
                                    <?php endif;?>
                                    <select value="<?=get_var('gender')?>" name="gender" id="gender" class="form-control form-control-sm custom-select">
                                        <option  value="" disabled="" selected="">--Select Gender--</option>
                                        <option style="color: red;" value="Male">Male</option>
                                        <option style="color: red;" value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=""  >Phone:</label>
                                    <?php if(!empty($errors['phone'])):?>
                                        <div style="color: red;"><?=$errors['phone']?></div>
                                    <?php endif;?>
                                    <input value="<?=get_var('phone')?>" placeholder="" type="text" name="phone" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=""  >Address:</label>
                                    <?php if(!empty($errors['address'])):?>
                                        <div style="color: red;"><?=$errors['address']?></div>
                                    <?php endif;?>
                                    <input value="<?=get_var('address')?>" placeholder="" type="text" name="address" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=""  > Province:</label>
                                    <?php if(!empty($errors['province'])):?>
                                        <div style="color: red;"><?=$errors['province']?></div>
                                    <?php endif;?>
                                    <input value="<?=get_var('province')?>" placeholder="" type="text" name="province" class="form-control" value="1">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=""  >Town:</label>
                                    <?php if(!empty($errors['town'])):?>
                                        <div style="town: red;"><?=$errors['town']?></div>
                                    <?php endif;?>
                                    <input value="<?=get_var('town')?>" placeholder="" type="text" name="town" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=""  >Occupation:</label>
                                    <?php if(!empty($errors['occupation'])):?>
                                        <div style="color: red;"><?=$errors['occupation']?></div>
                                    <?php endif;?>
                                    <input value="<?=get_var('occupation')?>" placeholder="" type="text" name="occupation" class="form-control">
                                </div>
                            </div>
                            


                            <div class="pb-4 pt-2">
                                <a href="<?=ROOT?>/staff_members">
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
